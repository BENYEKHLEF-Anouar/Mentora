<?php
require '../../config/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Security Checks
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Méthode non autorisée.");
}
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'mentor') {
    die("Accès refusé.");
}
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Erreur de validation CSRF.");
}

$idUtilisateur = $_SESSION['user']['id'];
$titre = trim($_POST['titreRessource']);
// Note: The 'descriptionRessource' field from your form does not exist in the DB schema.
// We will ignore it for now. If you add the column, you can uncomment the next line.
// $description = trim($_POST['descriptionRessource']); 

if (empty($titre) || !isset($_FILES['fileUpload']) || $_FILES['fileUpload']['error'] == UPLOAD_ERR_NO_FILE) {
    $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Le titre et le fichier sont obligatoires.'];
    header('Location: ../dashboard-mentor.php#ressources');
    exit;
}

$file = $_FILES['fileUpload'];

// 2. File Validation
$uploadDir = '../../assets/uploads/resources/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$allowedTypes = [
    'pdf' => 'application/pdf',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'mp4' => 'video/mp4',
    'mov' => 'video/quicktime',
    'jpg' => 'image/jpeg',
    'png' => 'image/png'
];
$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$fileTypeEnum = array_search($file['type'], $allowedTypes);

if ($fileTypeEnum === false || !array_key_exists($fileExtension, $allowedTypes)) {
    $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Type de fichier non autorisé.'];
    header('Location: ../dashboard-mentor.php#ressources');
    exit;
}

// 3. Generate unique filename and move file
$newFileName = uniqid('res_', true) . '.' . $fileExtension;
$uploadPath = $uploadDir . $newFileName;

if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
    try {
        $stmt = $pdo->prepare(
            "INSERT INTO Ressource (titreRessource, cheminRessource, typeFichier, idUtilisateur) VALUES (?, ?, ?, ?)"
        );
        // We use the relative path for storage
        $dbPath = 'resources/' . $newFileName;
        // The typeFichier column in your schema uses an ENUM mapping.
        // We need to determine the correct enum value.
        $typeFichier = 'image'; // default
        if (in_array($fileExtension, ['pdf', 'docx', 'pptx'])) $typeFichier = $fileExtension;
        if (in_array($fileExtension, ['mp4', 'mov'])) $typeFichier = 'video';
        
        $stmt->execute([$titre, $dbPath, $typeFichier, $idUtilisateur]);

        $_SESSION['feedback'] = ['type' => 'success', 'message' => 'Ressource ajoutée avec succès.'];
    } catch (PDOException $e) {
        // If DB insert fails, delete the uploaded file
        unlink($uploadPath);
        error_log("Add resource error: " . $e->getMessage());
        $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Erreur de base de données.'];
    }
} else {
    $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Erreur lors du téléversement du fichier.'];
}

header('Location: ../dashboard-mentor.php#ressources');
exit;