<?php
// Core application files
require '../config/config.php';
require '../config/helpers.php';

// --- DATA FETCHING (No changes needed here) ---
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: mentors.php");
    exit();
}
$mentorId = (int)$_GET['id'];
$stmt = $pdo->prepare("
    SELECT
        u.idUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.ville, u.photoUrl,
        m.competences,
        AVG(p.notation) AS average_rating,
        COUNT(DISTINCT p.idParticipation) AS review_count
    FROM Mentor m
    JOIN Utilisateur u ON m.idUtilisateur = u.idUtilisateur
    LEFT JOIN Session s ON s.idMentorAnimateur = m.idMentor
    LEFT JOIN Participation p ON p.idSession = s.idSession AND p.notation IS NOT NULL
    WHERE m.idMentor = :mentor_id
    GROUP BY u.idUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.ville, u.photoUrl, m.competences
");
$stmt->execute([':mentor_id' => $mentorId]);
$mentor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$mentor) { header("Location: mentors.php"); exit(); }

$stmtDispo = $pdo->prepare("
    SELECT jourSemaine, TIME_FORMAT(heureDebut, '%H:%i') as heureDebut, TIME_FORMAT(heureFin, '%H:%i') as heureFin
    FROM Disponibilite WHERE idUtilisateur = :user_id ORDER BY FIELD(jourSemaine, 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche')");
$stmtDispo->execute([':user_id' => $mentor['idUtilisateur']]);
$availability = $stmtDispo->fetchAll(PDO::FETCH_ASSOC);

$stmtSessions = $pdo->prepare("
    SELECT * FROM Session WHERE idMentorAnimateur = :mentor_id AND statutSession IN ('en_attente', 'validee') AND dateSession >= CURDATE()
    ORDER BY dateSession ASC, heureSession ASC LIMIT 5");
$stmtSessions->execute([':mentor_id' => $mentorId]);
$sessions = $stmtSessions->fetchAll(PDO::FETCH_ASSOC);

require_once '../includes/header.php';
?>
<!-- Link to the new profile stylesheet -->
<link rel="stylesheet" href="../assets/css/profile.css?v=<?php echo time(); ?>">

<main class="profile-page-main">
    <div class="container">
        <div class="profile-container">

            <!-- Main Content (Left Column) -->
            <div class="profile-main-content">
                <div class="profile-header-card">
                    <img src="<?= get_profile_image_path($mentor['photoUrl']) ?>" alt="Photo de <?= htmlspecialchars($mentor['prenomUtilisateur']) ?>" class="profile-header-avatar">
                    <div class="profile-header-info">
                        <h1><?= htmlspecialchars($mentor['prenomUtilisateur'] . ' ' . $mentor['nomUtilisateur']) ?></h1>
                        <div class="profile-header-meta">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span><?= $mentor['review_count'] > 0 ? number_format($mentor['average_rating'], 1) : 'N/A'; ?></span>
                                <small>(<?= $mentor['review_count'] ?> avis)</small>
                            </div>
                            <?php if (!empty($mentor['ville'])): ?>
                                <div class="location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($mentor['ville']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="content-card">
                    <h2>À propos de ce mentor</h2>
                    <p>
                        Spécialiste dans les domaines suivants, ce mentor est prêt à vous accompagner dans votre parcours d'apprentissage.
                    </p>
                    <div class="tags-list">
                        <?php foreach (explode(',', $mentor['competences']) as $skill): ?>
                            <span class="tag"><?= htmlspecialchars(trim($skill)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if (!empty($sessions)): ?>
                <div class="content-card">
                    <h2>Sessions à venir</h2>
                     <div class="schedule-list">
                        <?php foreach($sessions as $session): ?>
                            <a href="session_details.php?id=<?= $session['idSession'] ?>" class="schedule-item" style="text-decoration:none;">
                                <span class="schedule-day"><?= htmlspecialchars($session['titreSession']) ?></span>
                                <span class="schedule-time" style="color:var(--primary-blue); background-color:#eff6ff;"><?= date('d M Y', strtotime($session['dateSession'])) ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar (Right Column) -->
            <aside class="profile-sidebar">
                <div class="sidebar-card">
                     <a href="#" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp; Contacter ce Mentor</a>
                </div>

                <?php if (!empty($availability)): ?>
                <div class="sidebar-card">
                    <h2>Disponibilités</h2>
                    <div class="schedule-list">
                        <?php foreach ($availability as $slot): ?>
                        <div class="schedule-item">
                            <span class="schedule-day"><?= htmlspecialchars($slot['jourSemaine']) ?></span>
                            <span class="schedule-time"><?= $slot['heureDebut'] ?> - <?= $slot['heureFin'] ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </aside>

        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>