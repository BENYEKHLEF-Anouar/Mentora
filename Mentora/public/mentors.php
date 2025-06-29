<?php
// FIX: Include the corrected config file first
require '../config/config.php';

// --- CONFIGURATION ---
$limit = 6;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// --- FILTERING ---
$whereClauses = [];
$queryParams = [];
$search = $_GET['search'] ?? '';

if (!empty($search)) {
    // Add WHERE clauses for the main query
    $whereClauses[] = "(CONCAT(u.prenomUtilisateur, ' ', u.nomUtilisateur) LIKE :search OR m.competences LIKE :search)";
    $queryParams[':search'] = '%' . $search . '%';
}

$sqlWhere = '';
if (!empty($whereClauses)) {
    $sqlWhere = ' WHERE ' . implode(' AND ', $whereClauses);
}

// --- GET TOTAL COUNT FOR PAGINATION ---
$countSql = "SELECT COUNT(m.idMentor) FROM Mentor m JOIN Utilisateur u ON m.idUtilisateur = u.idUtilisateur" . $sqlWhere;
$stmtCount = $pdo->prepare($countSql);
$stmtCount->execute($queryParams); // Use the same params as the main query for an accurate count
$totalMentors = $stmtCount->fetchColumn();
$totalPages = ceil($totalMentors / $limit);

// --- AVAILABILITY PARAMS ---
date_default_timezone_set('Europe/Paris');
$days = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
$currentDayName = $days[date('w')];
$currentTime = date('H:i:s');

// --- REFACTORED: GET MENTORS FOR CURRENT PAGE ---
// This query is more efficient than using subqueries for each row.
$mentorsSql = "
    SELECT
        u.prenomUtilisateur, u.nomUtilisateur, u.photoUrl,
        m.idMentor, m.competences,
        stats.average_rating,
        stats.review_count,
        CASE WHEN EXISTS (
            SELECT 1 FROM Disponibilite d WHERE d.idUtilisateur = u.idUtilisateur
            AND d.jourSemaine = :current_day AND :current_time BETWEEN d.heureDebut AND d.heureFin
        ) THEN 1 ELSE 0 END AS is_available
    FROM Mentor m
    JOIN Utilisateur u ON m.idUtilisateur = u.idUtilisateur
    LEFT JOIN (
        SELECT s.idMentorAnimateur, AVG(p.notation) as average_rating, COUNT(p.idParticipation) as review_count
        FROM Session s
        JOIN Participation p ON s.idSession = p.idSession
        WHERE p.notation IS NOT NULL
        GROUP BY s.idMentorAnimateur
    ) AS stats ON m.idMentor = stats.idMentorAnimateur
    $sqlWhere
    GROUP BY m.idMentor, u.idUtilisateur
    ORDER BY is_available DESC, stats.average_rating DESC, stats.review_count DESC
    LIMIT :limit OFFSET :offset
";

$stmtMentors = $pdo->prepare($mentorsSql);

// Bind all parameters
$stmtMentors->bindValue(':current_day', $currentDayName, PDO::PARAM_STR);
$stmtMentors->bindValue(':current_time', $currentTime, PDO::PARAM_STR);
if (!empty($search)) {
    $stmtMentors->bindValue(':search', $queryParams[':search'], PDO::PARAM_STR);
}
$stmtMentors->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmtMentors->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmtMentors->execute();
$mentors = $stmtMentors->fetchAll(PDO::FETCH_ASSOC);

// Now include the corrected header
require_once '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/mentors.css">

<main>
    <section class="search-page-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Trouvez votre mentor idéal</h2>
            <p class="section-subtitle" data-aos="fade-up">Utilisez les filtres pour affiner votre recherche et trouver l'expert qui correspond parfaitement à vos besoins.</p>
            
            <form method="GET" action="mentors.php" class="search-form" data-aos="fade-up" data-aos-delay="50">
                <div class="search-bar-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" name="search" class="search-input" placeholder="Rechercher par nom, matière (ex: 'Mathématiques', 'Karim')..." value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="search-submit-btn">Rechercher</button>
                </div>
            </form>

            <div class="filters-bar" data-aos="fade-up" data-aos-delay="100">
                <button class="filter-btn"><i class="fas fa-book-open"></i> Matière <i class="fas fa-chevron-down"></i></button>
                <button class="filter-btn"><i class="fas fa-dollar-sign"></i> Tarif <i class="fas fa-chevron-down"></i></button>
                <button class="filter-btn"><i class="fas fa-calendar-check"></i> Disponibilité <i class="fas fa-chevron-down"></i></button>
                <button class="filter-btn"><i class="fas fa-star"></i> Note <i class="fas fa-chevron-down"></i></button>
                <a href="mentors.php" class="filter-btn clear-filters-btn"><i class="fas fa-times"></i> Réinitialiser</a>
            </div>

            <div class="profile-grid">
                <?php if (empty($mentors)): ?>
                    <p class="no-results">Aucun mentor ne correspond à votre recherche.</p>
                <?php else: ?>
                    <?php 
                    // Initialize index for staggered animation
                    $cardIndex = 0; 
                    foreach ($mentors as $mentor): 
                    ?>
                        <div class="profile-card" data-aos="fade-up" data-aos-delay="<?= ($cardIndex % 3 + 1) * 100 ?>">
                            <div class="card-image-container">
                                <img src="<?= get_profile_image_path($mentor['photoUrl']) ?>" alt="<?= htmlspecialchars($mentor['prenomUtilisateur'] . ' ' . $mentor['nomUtilisateur']) ?>">
                                <?php if (($mentor['average_rating'] ?? 0) >= 4.8 && ($mentor['review_count'] ?? 0) > 10): // Example criteria for "Top Mentor" ?>
                                     <span class="card-badge">Top Mentor</span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h3 class="profile-name"><?= htmlspecialchars($mentor['prenomUtilisateur'] . ' ' . $mentor['nomUtilisateur']) ?></h3>
                                <p class="profile-specialty"><?= htmlspecialchars($mentor['competences']) ?></p>
                                <div class="profile-rating">
                                    <?php if (!empty($mentor['review_count'])): ?>
                                        <i class="fa-solid fa-star"></i>
                                        <strong><?= number_format($mentor['average_rating'], 1) ?></strong>
                                        <span>(<?= $mentor['review_count'] ?> avis)</span>
                                    <?php else: ?>
                                        <span><i class="fa-regular fa-star"></i> Pas encore d'avis</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span>
                                    <span class="status-dot <?= $mentor['is_available'] ? 'available' : 'busy' ?>"></span>
                                    <?= $mentor['is_available'] ? 'Disponible' : 'Occupé' ?>
                                </span>
                                <a href="mentor_profile.php?id=<?= $mentor['idMentor'] ?>" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php 
                    $cardIndex++; // Increment index for the next card
                    endforeach; 
                    ?>
                <?php endif; ?>
            </div>

            <?php if ($totalPages > 1): ?>
                <nav class="pagination" aria-label="Page navigation" data-aos="fade-up">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>" class="pagination-link prev" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i> Précédent
                        </a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                         <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" class="pagination-link <?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>" class="pagination-link next" aria-label="Next">
                        Suivant <i class="fas fa-chevron-right"></i>
                    </a>
                     <?php endif; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require_once '../includes/footer.php'; ?>