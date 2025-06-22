<?php
require '../../config/config.php';
require '../../config/helpers.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

header('Content-Type: application/json');

// --- Security Checks ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user'])) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Accès refusé.']);
    exit;
}
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Erreur CSRF.']);
    exit;
}

$idExpediteur = $_SESSION['user']['id'];
$idDestinataire = filter_input(INPUT_POST, 'recipientId', FILTER_VALIDATE_INT);
$contenuMessage = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));

if (!$idDestinataire || empty($contenuMessage)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Données manquantes.']);
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO Message (idExpediteur, idDestinataire, contenuMessage) VALUES (?, ?, ?)"
    );
    $stmt->execute([$idExpediteur, $idDestinataire, $contenuMessage]);
    
    // You could also return the newly created message to append it perfectly
    echo json_encode(['status' => 'success', 'message' => 'Message envoyé.']);

} catch (PDOException $e) {
    http_response_code(500);
    error_log("Send message error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Erreur de base de données.']);
}