<?php
require '../config/config.php';
require '../config/helpers.php';

if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

$csrf_token = $_SESSION['csrf_token'];
$user_id = $_SESSION['user']['id'];

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
$success_message = $_SESSION['success_message'] ?? null;
unset($_SESSION['success_message']);

$stmt = $pdo->prepare("SELECT u.nomUtilisateur, u.prenomUtilisateur, u.ville, m.competences, u.photoUrl, u.emailUtilisateur FROM Utilisateur u LEFT JOIN Mentor m ON u.idUtilisateur = m.idUtilisateur WHERE u.idUtilisateur = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch();

function get_field_class($form_type, $field_name) {
    global $errors, $success_message;
    if ($success_message) return 'success';
    return !empty($errors[$form_type][$field_name]) ? 'error' : '';
}

require '../includes/header.php';
?>

<main class="edit-profile-container">
    <div class="edit-profile-header">
        <a href="javascript:history.back()" class="sidebar-back-link"><i class="fas fa-arrow-left"></i> Retour</a>
        <h1 class="page-title">Modifier mon profil</h1>
    </div>

    <?php if($success_message): ?>
        <div class="message success"><i class="fas fa-check-circle"></i> <?= sanitize($success_message) ?></div>
    <?php endif; ?>
    <?php if(!empty($errors['general'])): ?>
        <div class="message error"><i class="fas fa-exclamation-triangle"></i> <?= sanitize($errors['general']) ?></div>
    <?php endif; ?>

    <div class="profile-card">
        <h2>Photo de profil</h2>
        <form action="actions/update_profile.php" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            <input type="hidden" name="form_type" value="photo">
            <div class="photo-upload-area">
                <img src="<?= get_profile_image_path($user_data['photoUrl']) ?>" alt="Photo de profil actuelle" id="photoPreview">
                <label for="photoUpload" class="photo-upload-label"><i class="fas fa-camera"></i> <span>Changer la photo</span></label>
                <input type="file" name="photo" id="photoUpload" accept="image/jpeg, image/png, image/webp" hidden>
            </div>
            <?php if (!empty($errors['photo']['photo'])): ?>
                <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['photo']['photo']) ?></p>
            <?php endif; ?>
            <button type="submit"><i class="fas fa-save"></i> Enregistrer la photo</button>
        </form>
    </div>

    <div class="profile-card">
        <h2>Informations personnelles</h2>
        <form action="actions/update_profile.php" method="POST" novalidate>
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            <input type="hidden" name="form_type" value="info">
            <div class="form-grid">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <div class="relative">
                        <input type="text" id="prenom" name="prenom" value="<?= sanitize($user_data['prenomUtilisateur']) ?>" class="<?= get_field_class('info', 'prenom') ?>" required>
                        <svg class="left-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <div class="relative">
                        <input type="text" id="nom" name="nom" value="<?= sanitize($user_data['nomUtilisateur']) ?>" class="<?= get_field_class('info', 'nom') ?>" required>
                        <svg class="left-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <div class="relative">
                    <input type="text" id="ville" name="ville" value="<?= sanitize($user_data['ville']) ?>" class="<?= get_field_class('info', 'ville') ?>">
                    <svg class="left-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
            </div>
            <?php if ($_SESSION['user']['role'] === 'mentor'): ?>
            <div class="form-group">
                <label for="competences">Compétences / Spécialité</label>
                <textarea id="competences" name="competences" rows="3" placeholder="Ex: PHP, SQL, JavaScript..." class="<?= get_field_class('info', 'competences') ?>"><?= sanitize($user_data['competences']) ?></textarea>
            </div>
            <?php endif; ?>
            <button type="submit"><i class="fas fa-save"></i> Enregistrer</button>
        </form>
    </div>

    <div class="profile-card">
        <h2>Changer le mot de passe</h2>
        <form action="actions/update_profile.php" method="POST" novalidate>
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            <input type="hidden" name="form_type" value="password">
            <div class="form-group">
                <label for="current_password">Mot de passe actuel</label>
                <div class="relative">
                    <input type="password" id="current_password" name="current_password" placeholder="• • • • • • • •" required class="<?= get_field_class('password', 'current_password') ?>">
                    <svg class="left-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    <svg class="eye-toggle" id="toggleCurrentPassword" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                <?php if (!empty($errors['password']['current_password'])): ?><p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['password']['current_password']) ?></p><?php endif; ?>
            </div>
            <div class="form-group">
                <label for="new_password">Nouveau mot de passe</label>
                <div class="relative">
                    <input type="password" id="new_password" name="new_password" placeholder="• • • • • • • •" required class="<?= get_field_class('password', 'new_password') ?>">
                    <svg class="left-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path><circle cx="16.5" cy="7.5" r=".5"></circle></svg>
                    <svg class="eye-toggle" id="toggleNewPassword" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                <?php if (!empty($errors['password']['new_password'])): ?><p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['password']['new_password']) ?></p><?php endif; ?>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmer</label>
                <div class="relative">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="• • • • • • • •" required class="<?= get_field_class('password', 'confirm_password') ?>">
                    <svg class="left-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path><circle cx="16.5" cy="7.5" r=".5"></circle></svg>
                    <svg class="eye-toggle" id="toggleConfirmPassword" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                 <?php if (!empty($errors['password']['confirm_password'])): ?><p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= sanitize($errors['password']['confirm_password']) ?></p><?php endif; ?>
            </div>
            <button type="submit"><i class="fas fa-key"></i> Changer</button>
        </form>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        if (preloader) preloader.style.display = 'none';
    });

    /**
     * Sets up the show/hide password functionality for a given input and its toggle button.
     * This is a reusable version of the script from login.php, designed for multiple password fields.
     * @param {string} inputId The ID of the password <input> element.
     * @param {string} toggleId The ID of the <svg> toggle element.
     */
    function setupPasswordToggle(inputId, toggleId) {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);
        if (!input || !toggle) return; // Exit if elements are not found

        toggle.addEventListener('click', () => {
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            // Toggle the SVG icon inside the button, using the same icons as login.php
            toggle.innerHTML = isPassword
                ? `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>` // Eye-slash icon
                : `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>`; // Eye icon
        });
    }

    // Apply the toggle functionality to all three password fields.
    setupPasswordToggle('current_password', 'toggleCurrentPassword');
    setupPasswordToggle('new_password', 'toggleNewPassword');
    setupPasswordToggle('confirm_password', 'toggleConfirmPassword');

    const photoUpload = document.getElementById('photoUpload');
    const photoPreview = document.getElementById('photoPreview');
    if (photoUpload && photoPreview) {
        photoUpload.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) { // 2MB limit
                    alert('La taille de l\\\'image ne doit pas dépasser 2 Mo.');
                    event.target.value = '';
                    return;
                }
                photoPreview.src = URL.createObjectURL(file);
            }
        });
    }
});
</script>

<?php require_once '../includes/footer.php'; ?>

</body>
</html>

