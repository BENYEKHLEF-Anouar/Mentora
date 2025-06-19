<?php
require '../config/config.php';

// --- CONFIGURATION ---
$limit = 6; // Match the mentor page limit
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// --- FILTERING LOGIC ---
$whereClauses = [];
$queryParams = [];
$searchParams = []; // For pagination links

$search = $_GET['search'] ?? '';
if (!empty($search)) {
    $whereClauses[] = "(CONCAT(u.prenomUtilisateur, ' ', u.nomUtilisateur) LIKE :search OR e.sujetRecherche LIKE :search)";
    $queryParams[':search'] = '%' . $search . '%';
    $searchParams['search'] = $search;
}
// Add other filters (sujet, niveau, ville) here if you make them functional later

$sqlWhere = '';
if (!empty($whereClauses)) {
    $sqlWhere = ' WHERE ' . implode(' AND ', $whereClauses);
}

// --- GET TOTAL COUNT FOR PAGINATION ---
$countSql = "SELECT COUNT(e.idEtudiant) FROM Etudiant e JOIN Utilisateur u ON e.idUtilisateur = u.idUtilisateur" . $sqlWhere;
$stmtCount = $pdo->prepare($countSql);
$stmtCount->execute($queryParams);
$totalStudents = $stmtCount->fetchColumn();
$totalPages = ceil($totalStudents / $limit);

// --- GET STUDENTS FOR CURRENT PAGE ---
$studentsSql = "
    SELECT
        u.prenomUtilisateur, u.nomUtilisateur, u.photoUrl, u.ville,
        e.idEtudiant, e.niveau, e.sujetRecherche
    FROM Etudiant e
    JOIN Utilisateur u ON e.idUtilisateur = u.idUtilisateur
    $sqlWhere
    ORDER BY u.idUtilisateur DESC
    LIMIT :limit OFFSET :offset
";

$stmtStudents = $pdo->prepare($studentsSql);
$stmtStudents->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmtStudents->bindValue(':offset', $offset, PDO::PARAM_INT);
if (!empty($search)) {
    $stmtStudents->bindValue(':search', $queryParams[':search']);
}

$stmtStudents->execute();
$students = $stmtStudents->fetchAll(PDO::FETCH_ASSOC);

require_once '../includes/header.php';
?>

<!-- LINK TO THE UNIFIED MENTORS.CSS FILE -->
<link rel="stylesheet" href="../assets/css/mentors.css">

<main>
    <section class="search-page-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Trouvez des étudiants à accompagner</h2>
            <p class="section-subtitle" data-aos="fade-up">Parcourez les profils des étudiants qui recherchent un mentor et proposez votre aide.</p>
            
            <form method="GET" action="students.php" class="search-form" data-aos="fade-up" data-aos-delay="50">
                <div class="search-bar-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" name="search" class="search-input" placeholder="Rechercher par nom ou besoin (ex: 'Adam', 'Orientation')..." value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="search-submit-btn">Rechercher</button>
                </div>
            </form>

            <!-- UNIFIED FILTER BAR - Identical to mentors.php -->
            <div class="filters-bar" data-aos="fade-up" data-aos-delay="100">
                <button class="filter-btn"><i class="fas fa-book-open"></i> Matière <i class="fas fa-chevron-down"></i></button>
                <button class="filter-btn"><i class="fas fa-graduation-cap"></i> Niveau <i class="fas fa-chevron-down"></i></button>
                <button class="filter-btn"><i class="fas fa-map-marker-alt"></i> Localisation <i class="fas fa-chevron-down"></i></button>
                <a href="students.php" class="filter-btn clear-filters-btn"><i class="fas fa-times"></i> Réinitialiser</a>
            </div>

            <div class="profile-grid">
                <?php if (empty($students)): ?>
                    <p class="no-results">Aucun étudiant ne correspond à votre recherche.</p>
                <?php else: ?>
                    <?php 
                    $cardIndex = 0; 
                    foreach ($students as $student): 
                    ?>
                        <!-- UNIFIED PROFILE CARD - Identical structure to mentors.php -->
                        <div class="profile-card" data-aos="fade-up" data-aos-delay="<?= ($cardIndex % 3 + 1) * 100 ?>">
                            <div class="card-image-container">
                                <img src="<?= get_profile_image_path($student['photoUrl']) ?>" alt="<?= htmlspecialchars($student['prenomUtilisateur'] . ' ' . $student['nomUtilisateur']) ?>">
                            </div>
                            <div class="card-body">
                                <h3 class="profile-name"><?= htmlspecialchars($student['prenomUtilisateur'] . ' ' . $student['nomUtilisateur']) ?></h3>
                                <!-- Using profile-specialty class for consistent styling -->
                                <p class="profile-specialty"><?= htmlspecialchars($student['sujetRecherche']) ?> (<?= htmlspecialchars($student['niveau']) ?>)</p>
                            </div>
                            <div class="card-footer">
                                <span>
                                    <span class="status-dot searching"></span>
                                    Recherche un mentor
                                </span>
                                <a href="student_profile.php?id=<?= $student['idEtudiant'] ?>" class="card-action">Voir Profil <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php 
                    $cardIndex++;
                    endforeach; 
                    ?>
                <?php endif; ?>
            </div>

            <!-- UNIFIED PAGINATION - Identical to mentors.php -->
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