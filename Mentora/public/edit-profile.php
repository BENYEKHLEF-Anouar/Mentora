<?php
require '../config/config.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit;
}

// MODIFIED: Start session if not already started to handle flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];
$user_id = $_SESSION['user']['id'];

// MODIFIED: Get errors from session flash data and then clear them
$errors = $_SESSION['errors'] ?? [
    'photo' => [],
    'info' => [],
    'password' => []
];
unset($_SESSION['errors']);

// MODIFIED: Get success message from session flash data
$success_message = $_SESSION['success_message'] ?? null;
unset($_SESSION['success_message']);


// Get user data
$stmt = $pdo->prepare("SELECT u.nomUtilisateur, u.prenomUtilisateur, u.ville, m.competences, u.photoUrl, u.emailUtilisateur 
                      FROM Utilisateur u 
                      LEFT JOIN Mentor m ON u.idUtilisateur = m.idUtilisateur 
                      WHERE u.idUtilisateur = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch();

// MODIFIED: Helper function to get field class for error styling, adapted from login.php
function get_field_class($form_type, $field_name) {
    global $errors; 
    if (!empty($errors[$form_type][$field_name])) {
        return 'error';
    }
    return ''; 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Mon Profil - Mentora</title>
    <?php require '../includes/header.php'; ?>
    <link rel="stylesheet" href="../assets/css/edit-profile.css?v=<?= filemtime(__DIR__ . '/../assets/css/edit-profile.css') ?>">
</head>
<body>
    <main class="edit-profile-container">
        <a href="javascript:history.back()" class="sidebar-back-link"><i class="fas fa-arrow-left"></i>Retour</a>
        <h1 class="page-title">Modifier mon profil</h1>
        
        <?php if($success_message): ?>
            <p class="message success"><i class="fas fa-check-circle"></i> <?= sanitize($success_message) ?></p>
        <?php endif; ?>

        <?php if(!empty($errors['general'])): ?>
            <p class="message error"><i class="fas fa-exclamation-triangle"></i> <?= sanitize($errors['general']) ?></p>
        <?php endif; ?>

        <div class="profile-card">
            <h2>Photo de profil</h2>
            <form action="actions/update_profile.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                <input type="hidden" name="form_type" value="photo">
                <div class="photo-upload-area">
                    <img src="<?= get_profile_image_path($user_data['photoUrl']) ?>" alt="Current profile picture" id="photoPreview">
                    <label for="photoUpload" class="photo-upload-label"><i class="fas fa-camera"></i> <span>Changer la photo</span></label>
                    <input type="file" name="photo" id="photoUpload" accept="image/jpeg, image/png, image/webp" hidden>
                </div>
                <?php if (!empty($errors['photo']['photo'])): ?>
                    <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['photo']['photo']) ?></p>
                <?php endif; ?>
                <button type="submit"><i class="fas fa-save"></i>  Enregistrer la photo</button>
            </form>
        </div>

        <div class="profile-card">
            <h2>Informations personnelles</h2>
            <form action="actions/update_profile.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                <input type="hidden" name="form_type" value="info">
                <div class="form-grid">
                    <div class="form-group"><label for="prenom">Prénom</label><input type="text" id="prenom" name="prenom" value="<?= sanitize($user_data['prenomUtilisateur']) ?>"></div>
                    <div class="form-group"><label for="nom">Nom</label><input type="text" id="nom" name="nom" value="<?= sanitize($user_data['nomUtilisateur']) ?>"></div>
                </div>
                <div class="form-group"><label for="ville">Ville</label><input type="text" id="ville" name="ville" value="<?= sanitize($user_data['ville']) ?>"></div>
                <?php if ($_SESSION['user']['role'] === 'mentor'): ?>
                <div class="form-group"><label for="competences">Compétences / Spécialité</label><textarea id="competences" name="competences" rows="3"><?= sanitize($user_data['competences']) ?></textarea></div>
                <?php endif; ?>
                <button type="submit"><i class="fas fa-save"></i>  Enregistrer les informations</button>
            </form>
        </div>

        <div class="profile-card">
            <h2>Changer le mot de passe</h2>
            <form action="actions/update_profile.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                <input type="hidden" name="form_type" value="password">
                
                <div class="form-group">
                    <label for="current_password">Mot de passe actuel</label>
                    <div class="relative">
                        <input type="password" id="current_password" name="current_password"  placeholder="• • • • • • • •" required class="<?= get_field_class('password', 'current_password') ?>">
                        <!-- MODIFIED: Replaced button with SVG from login.php -->
                        <svg class="eye-toggle" id="toggleCurrentPassword" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                           <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <?php if (!empty($errors['password']['current_password'])): ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['password']['current_password']) ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <div class="relative">
                        <input type="password" id="new_password" name="new_password"  placeholder="• • • • • • • •" required  class="<?= get_field_class('password', 'new_password') ?>">
                        <!-- MODIFIED: Replaced button with SVG from login.php -->
                        <svg class="eye-toggle" id="toggleNewPassword" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                           <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <?php if (!empty($errors['password']['new_password'])): ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['password']['new_password']) ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                    <div class="relative">
                        <input type="password" id="confirm_password" name="confirm_password"  placeholder="• • • • • • • •" required  class="<?= get_field_class('password', 'confirm_password') ?>">
                        <!-- MODIFIED: Replaced button with SVG from login.php -->
                         <svg class="eye-toggle" id="toggleConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                           <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                     <?php if (!empty($errors['password']['confirm_password'])): ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['password']['confirm_password']) ?></p>
                    <?php endif; ?>
                </div>
                
                <button type="submit"><i class="fas fa-key"></i>  Changer le mot de passe</button>
            </form>
        </div>
    </main>
    <?php require '../includes/footer.php'; ?>
    <script>
    // MODIFIED: This is the exact password toggle script from login.php, made into a reusable function
    function setupPasswordToggle(passwordInputId, toggleButtonId) {
        const passwordInput = document.getElementById(passwordInputId);
        const eyeToggle = document.getElementById(toggleButtonId);
        
        if (passwordInput && eyeToggle) {
            eyeToggle.addEventListener('click', function() {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                
                // Toggle between eye and eye-slash SVG paths
                eyeToggle.innerHTML = isPassword ?
                    `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>` :
                    `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>`;
            });
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all three password toggles
        setupPasswordToggle('current_password', 'toggleCurrentPassword');
        setupPasswordToggle('new_password', 'toggleNewPassword');
        setupPasswordToggle('confirm_password', 'toggleConfirmPassword');

        // Photo upload preview (no changes needed here)
        const photoUpload = document.getElementById('photoUpload');
        const photoPreview = document.getElementById('photoPreview');
        if (photoUpload && photoPreview) {
            photoUpload.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        alert('Veuillez sélectionner une image valide (JPEG, PNG ou WebP)');
                        event.target.value = '';
                        return;
                    }
                    if (file.size > 2 * 1024 * 1024) {
                        alert('La taille de l\'image ne doit pas dépasser 2 Mo');
                        event.target.value = '';
                        return;
                    }
                    photoPreview.src = URL.createObjectURL(file);
                }
            });
        }

        // MODIFIED: Removed all client-side form validation JS.
        // It is now handled server-side for reliability, like on the login page.
    });
    </script>
</body>
</html>