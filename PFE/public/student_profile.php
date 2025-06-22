<?php
require '../config/config.php';
require '../config/helpers.php';

// --- DATA FETCHING (No changes needed) ---
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: students.php");
    exit();
}
$studentId = (int)$_GET['id'];
$stmt = $pdo->prepare("
    SELECT u.prenomUtilisateur, u.nomUtilisateur, u.ville, u.photoUrl, e.niveau, e.sujetRecherche
    FROM Etudiant e JOIN Utilisateur u ON e.idUtilisateur = u.idUtilisateur
    WHERE e.idEtudiant = :student_id");
$stmt->execute([':student_id' => $studentId]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) { header("Location: students.php"); exit(); }

require_once '../includes/header.php';
?>
<link rel="stylesheet" href="../assets/css/profile.css?v=<?php echo time(); ?>">

<main class="profile-page-main">
    <div class="container">
       <div class="profile-container">

            <!-- Main Content (Left Column) -->
            <div class="profile-main-content">
                <div class="profile-header-card">
                    <img src="<?= get_profile_image_path($student['photoUrl']) ?>" alt="Photo de <?= htmlspecialchars($student['prenomUtilisateur']) ?>" class="profile-header-avatar">
                    <div class="profile-header-info">
                        <h1><?= htmlspecialchars($student['prenomUtilisateur'] . ' ' . $student['nomUtilisateur']) ?></h1>
                        <div class="profile-header-meta">
                             <?php if (!empty($student['ville'])): ?>
                                <div class="location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($student['ville']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="content-card">
                    <h2>Objectifs d'apprentissage</h2>
                    <p>Cet étudiant cherche à développer ses compétences et connaissances dans le domaine suivant :</p>
                    <p style="font-size: 1.1rem; font-weight: 600;">"<?= htmlspecialchars($student['sujetRecherche']) ?>"</p>
                    <br>
                    <span class="tag">Niveau actuel: <?= htmlspecialchars($student['niveau']) ?></span>
                </div>
            </div>

            <!-- Sidebar (Right Column) -->
            <aside class="profile-sidebar">
                <div class="sidebar-card">
                     <a href="#" class="btn btn-primary"><i class="fas fa-hands-helping"></i>&nbsp; Proposer mon aide</a>
                </div>
            </aside>

        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>