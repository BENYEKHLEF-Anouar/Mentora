<?php
require '../../config/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Security Checks
if ($_SERVER['REQUEST_METHOD'] !== 'GET') { // This uses GET for simplicity, POST is better
    die("Méthode non autorisée.");
}
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'mentor') {
    die("Accès refusé.");
}
if (!isset($_GET['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_GET['csrf_token'])) {
    die("Erreur de validation CSRF.");
}

$idUtilisateur = $_SESSION['user']['id'];
$idRessource = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$idRessource) {
    header('Location: ../dashboard-mentor.php#ressources');
    exit;
}

try {
    // First, get the file path to delete it from the server
    $stmt = $pdo->prepare("SELECT cheminRessource FROM Ressource WHERE idRessource = ? AND idUtilisateur = ?");
    $stmt->execute([$idRessource, $idUtilisateur]);
    $resource = $stmt->fetch();

    if ($resource) {
        // Delete from database
        $stmt_delete = $pdo->prepare("DELETE FROM Ressource WHERE idRessource = ? AND idUtilisateur = ?");
        $stmt_delete->execute([$idRessource, $idUtilisateur]);

        // Delete the actual file
        $filePath = '../../assets/uploads/' . $resource['cheminRessource'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $_SESSION['feedback'] = ['type' => 'success', 'message' => 'Ressource supprimée avec succès.'];
    } else {
        $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Ressource non trouvée ou non autorisée.'];
    }

} catch (PDOException $e) {
    error_log("Delete resource error: " . $e->getMessage());
    $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Une erreur est survenue.'];
}

header('Location: ../dashboard-mentor.php#ressources');
exit;