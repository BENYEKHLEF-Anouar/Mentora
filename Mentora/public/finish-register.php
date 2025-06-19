<?php
require_once '../config/config.php';

// --- SECURITY GATE ---
if (!isset($_SESSION['new_user_id']) || !isset($_SESSION['registration_step']) || $_SESSION['registration_step'] !== 'finish') {
    header('Location: register.php');
    exit();
}

$idUtilisateur = $_SESSION['new_user_id'];
$errors = [];

// Fetch user's info to personalize the page
$stmt = $pdo->prepare("SELECT prenomUtilisateur, role, emailUtilisateur FROM Utilisateur WHERE idUtilisateur = ?");
$stmt->execute([$idUtilisateur]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    session_destroy();
    header('Location: register.php');
    exit();
}

// "Sticky" form fields
$ville = sanitize($_POST['ville'] ?? '');
$niveau = sanitize($_POST['niveau'] ?? '');
$competences = sanitize($_POST['competences'] ?? '');

// --- FORM SUBMISSION LOGIC ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit"])) {
    $photoFileName = $user['photoUrl'] ?? 'default_avatar.png'; // Start with default

    // --- Validation ---
    if (empty($ville)) {
        $errors['ville'] = "Veuillez indiquer votre ville.";
    }
    if ($user['role'] === 'etudiant' && empty($niveau)) {
        $errors['niveau'] = "Veuillez sélectionner votre niveau d'études.";
    }
    if ($user['role'] === 'mentor' && empty($competences)) {
        $errors['competences'] = "Veuillez décrire vos compétences.";
    }
    
        // --- File Upload Handling ---
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo = $_FILES['photo'];
            $uploadDir = '../assets/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $fileExtension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors['photo'] = "Format de fichier non autorisé (autorisés: jpg, png).";
            } elseif ($photo['size'] > 6291456) { // 6 MB limit (6 * 1024 * 1024)
                $errors['photo'] = "Le fichier est trop volumineux (max 6MB).";
            } else {
                $photoFileName = 'user_' . $idUtilisateur . '_' . time() . '.' . $fileExtension;
                if (!move_uploaded_file($photo['tmp_name'], $uploadDir . $photoFileName)) {
                     $errors['photo'] = "Erreur lors du téléchargement de l'image.";
                     $photoFileName = 'default_avatar.png';
                }
            }
        }

    // --- Database Update ---
    if (empty($errors)) {
        try {
            $pdo->beginTransaction();

            $stmtUser = $pdo->prepare("UPDATE Utilisateur SET ville = :ville, photoUrl = :photoUrl WHERE idUtilisateur = :id");
            $stmtUser->execute([':ville' => $ville, ':photoUrl' => $photoFileName, ':id' => $idUtilisateur]);
            
            if ($user['role'] === 'etudiant') {
                $stmtRole = $pdo->prepare("UPDATE Etudiant SET niveau = :niveau WHERE idUtilisateur = :id");
                $stmtRole->execute([':niveau' => $niveau, ':id' => $idUtilisateur]);
            } elseif ($user['role'] === 'mentor') {
                 $stmtRole = $pdo->prepare("UPDATE Mentor SET competences = :competences WHERE idUtilisateur = :id");
                $stmtRole->execute([':competences' => $competences, ':id' => $idUtilisateur]);
            }

            $pdo->commit();

            unset($_SESSION['new_user_id'], $_SESSION['registration_step']);
            header('Location: login.php?email=' . urlencode($user['emailUtilisateur']) . '&status=completed');
            exit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            $errors['general'] = "Une erreur technique est survenue. Veuillez réessayer.";
        }
    }
}

// HELPER FUNCTION FOR ERROR/SUCCESS CLASSES
function get_field_class($fieldName) {
    global $errors;
    return !empty($errors[$fieldName]) ? 'error' : '';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mentora - Finaliser l'inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../assets/css/register.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../assets/images/White_Tower_Symbol.webp" type="image/x-icon">
</head>
<body>
    <!-- Preloader structure is not needed here as it's a transient page -->

    <div class="header">
        <div class="logo-container">
            <div class="logo-icon"></div>
            <span class="logo-text">Mentora.</span>
        </div>
        <!-- Social icons are optional on this page, but can be added for consistency -->
    </div>

    <div class="main-content">
        <div class="container" data-aos="fade-down">
            <div class="title_container">
                <h2 class="title">Bienvenue, <?= htmlspecialchars($user['prenomUtilisateur']) ?> !</h2>
                <span class="subtitle">Encore une étape pour compléter votre profil.</span>
            </div>

            <?php if (!empty($errors['general'])): ?>
                <p class="message error"><i class="fa-solid fa-circle-exclamation"></i> <?= htmlspecialchars($errors['general']) ?></p>
            <?php endif; ?>

            <form action="finish-register.php" method="post" enctype="multipart/form-data">

                <div class="form-row">
                    <!-- Photo Upload -->
                    <div class="input-group">
                        <label class="input-label" for="photo">Photo de profil (Optionnel)</label>
                        <input type="file" id="photo" name="photo" class="input-file <?= get_field_class('photo') ?>">
                        <?php if (!empty($errors['photo'])): ?><p class="error-message"><i class="fa-solid fa-circle-exclamation"></i> <?= $errors['photo'] ?></p><?php endif; ?>
                    </div>
                    <!-- City -->
                    <div class="input-group">
                        <label class="input-label" for="ville">Votre ville</label>
                        <div class="relative">
                            <input type="text" id="ville" name="ville" placeholder="Ex: Casablanca, Paris..." value="<?= $ville ?>" class="<?= get_field_class('ville') ?>">
                            <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></div>
                        </div>
                        <?php if (!empty($errors['ville'])): ?><p class="error-message"><i class="fa-solid fa-circle-exclamation"></i> <?= $errors['ville'] ?></p><?php endif; ?>
                    </div>
                </div>

                <!-- Role-Specific Fields -->
                <div class="input-group">
                    <?php if ($user['role'] === 'etudiant'): ?>
                        <label class="input-label" for="niveau">Niveau d'études</label>
                        <select id="niveau" name="niveau" class="input-select <?= get_field_class('niveau') ?>">
                            <option value="" disabled selected>-- Sélectionnez votre niveau --</option>
                            <option value="Collège" <?= $niveau == 'Collège' ? 'selected' : '' ?>>Collège</option>
                            <option value="Lycée" <?= $niveau == 'Lycée' ? 'selected' : '' ?>>Lycée</option>
                            <option value="Première Année Supérieur" <?= $niveau == 'Première Année Supérieur' ? 'selected' : '' ?>>Première Année Supérieur</option>
                            <option value="Licence" <?= $niveau == 'Licence' ? 'selected' : '' ?>>Licence</option>
                            <option value="Master" <?= $niveau == 'Master' ? 'selected' : '' ?>>Master</option>
                            <option value="Doctorat" <?= $niveau == 'Doctorat' ? 'selected' : '' ?>>Doctorat</option>
                        </select>
                        <?php if (!empty($errors['niveau'])): ?><p class="error-message"><i class="fa-solid fa-circle-exclamation"></i> <?= $errors['niveau'] ?></p><?php endif; ?>
                    
                    <?php elseif ($user['role'] === 'mentor'): ?>
                        <label class="input-label" for="competences">Vos compétences</label>
                        <textarea id="competences" name="competences" rows="4" class="<?= get_field_class('competences') ?>"
                            placeholder="Ex: Mathématiques (Lycée), Développement Web (React, Node.js), Aide à l'orientation..."><?= $competences ?></textarea>
                        <?php if (!empty($errors['competences'])): ?><p class="error-message"><i class="fa-solid fa-circle-exclamation"></i> <?= $errors['competences'] ?></p><?php endif; ?>
                    <?php endif; ?>
                </div>
                
                <button class="btn" type="submit" name="submit">
                    <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" class="sparkle"><path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path></svg>
                    <span class="text">Terminer mon inscription</span>
                </button>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800
        });
    </script>
</body>
</html>