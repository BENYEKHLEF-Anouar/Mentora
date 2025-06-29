<?php
session_start();
require '../../config/config.php'; // Adjust path

// 1. Check Authentication, Role, and Method
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'mentor') {
    die("Unauthorized access.");
}

// 2. Validate CSRF token
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Invalid CSRF token.");
}

// 3. Check if file was uploaded
if (!isset($_FILES['fileUpload']) || $_FILES['fileUpload']['error'] !== UPLOAD_ERR_OK) {
    // Handle error, redirect with message
    header('Location: ../dashboard-mentor.php?error=upload_failed#ressources');
    exit;
}

// 4. Define constraints
$upload_dir = realpath(__DIR__ . '/../../assets/uploads') . '/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}
$allowed_mime_types = ['application/pdf', 'video/mp4', 'image/jpeg', 'image/png'];
$max_file_size = 5 * 1024 * 1024; // 5 MB

// 5. Validate file properties
$file_tmp_path = $_FILES['fileUpload']['tmp_name'];
$file_size = $_FILES['fileUpload']['size'];
$file_mime_type = mime_content_type($file_tmp_path);
$file_extension = strtolower(pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION));

if ($file_size > $max_file_size) {
    header('Location: ../dashboard-mentor.php?error=file_too_large#ressources');
    exit;
}
if (!in_array($file_mime_type, $allowed_mime_types)) {
    header('Location: ../dashboard-mentor.php?error=invalid_type#ressources');
    exit;
}

// 6. Generate a secure, unique filename
$new_filename = bin2hex(random_bytes(16)) . '.' . $file_extension;
$destination = $upload_dir . $new_filename;

// 7. Move file and save to DB
if (move_uploaded_file($file_tmp_path, $destination)) {
    try {
        $stmt = $pdo->prepare("INSERT INTO Ressource (titreRessource, cheminRessource, typeFichier, idUtilisateur) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $_POST['titreRessource'],
            $new_filename,
            $file_mime_type, // Storing MIME type is more reliable than extension
            $_SESSION['user']['id']
        ]);
        header('Location: ../dashboard-mentor.php?success=resource_added#ressources');
        exit();
    } catch (PDOException $e) {
        unlink($destination); // Clean up file if DB insert fails
        error_log("Resource Add Error: " . $e->getMessage());
        header('Location: ../dashboard-mentor.php?error=db_error#ressources');
        exit;
    }
} else {
    header('Location: ../dashboard-mentor.php?error=move_failed#ressources');
    exit;
}