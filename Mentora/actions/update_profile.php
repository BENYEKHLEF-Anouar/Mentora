<?php
require '../../config/config.php';

// 1. Check Auth & Request Validity
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user']) || !isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Invalid request.");
}

$user_id = $_SESSION['user']['id'];
$form_type = $_POST['form_type'] ?? '';

// 2. Handle Profile Info Update
if ($form_type === 'info') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $ville = $_POST['ville'];
    $competences = $_POST['competences'] ?? null;

    $pdo->prepare("UPDATE Utilisateur SET prenomUtilisateur = ?, nomUtilisateur = ?, ville = ? WHERE idUtilisateur = ?")->execute([$prenom, $nom, $ville, $user_id]);
    
    if ($_SESSION['user']['role'] === 'mentor' && $competences !== null) {
        $pdo->prepare("UPDATE Mentor SET competences = ? WHERE idUtilisateur = ?")->execute([$competences, $user_id]);
    }
    
    header('Location: ../edit-profile.php?success=info');
    exit;
}

// 3. Handle Password Change
if ($form_type === 'password') {
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    $stmt = $pdo->prepare("SELECT motDePasse FROM Utilisateur WHERE idUtilisateur = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($current_pass, $user['motDePasse'])) {
        header('Location: ../edit-profile.php?error=wrong_pass#password');
        exit;
    }
    if ($new_pass !== $confirm_pass) {
        header('Location: ../edit-profile.php?error=pass_mismatch#password');
        exit;
    }

    $hashed_new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
    $pdo->prepare("UPDATE Utilisateur SET motDePasse = ? WHERE idUtilisateur = ?")->execute([$hashed_new_pass, $user_id]);

    header('Location: ../edit-profile.php?success=pass_changed#password');
    exit;
}

// 4. Handle Photo Upload
if ($form_type === 'photo') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = realpath(__DIR__ . '/../../assets/uploads/') . '/';
        $allowed_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $max_size = 2 * 1024 * 1024; // 2MB

        if ($_FILES['photo']['size'] > $max_size || !in_array(mime_content_type($_FILES['photo']['tmp_name']), $allowed_mime)) {
            header('Location: ../edit-profile.php?error=invalid_file');
            exit;
        }

        $extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $new_filename = 'user_' . $user_id . '_' . time() . '.' . $extension;
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $new_filename)) {
            $pdo->prepare("UPDATE Utilisateur SET photoUrl = ? WHERE idUtilisateur = ?")->execute([$new_filename, $user_id]);
            $_SESSION['user']['photoUrl'] = $new_filename;
        }
    }
    header('Location: ../edit-profile.php?success=photo');
    exit;
}

header('Location: ../edit-profile.php');
exit;