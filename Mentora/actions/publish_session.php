<?php
require_once '../../config/config.php';

// 1. Check Auth, Role, Method, and CSRF Token
if ($_SERVER['REQUEST_METHOD'] !== 'POST' 
    || !isset($_SESSION['user']['id']) 
    || $_SESSION['user']['role'] !== 'mentor' 
    || !isset($_POST['csrf_token']) 
    || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    
    // Set an error message and redirect
    $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Requête invalide ou non autorisée.'];
    header('Location: ../dashboard-mentor.php#sessions');
    exit();
}

// 2. Sanitize and Validate Inputs
$titreSession = trim($_POST['titreSession'] ?? '');
$dateSession = trim($_POST['dateSession'] ?? '');
$heureSession = trim($_POST['heureSession'] ?? '');

// Simple validation
if (empty($titreSession) || empty($dateSession) || empty($heureSession)) {
    $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Veuillez remplir tous les champs obligatoires.'];
    header('Location: ../dashboard-mentor.php#sessions');
    exit();
}

// Get the mentor's specific ID (idMentor)
$stmt_mentor = $pdo->prepare("SELECT idMentor FROM Mentor WHERE idUtilisateur = ?");
$stmt_mentor->execute([$_SESSION['user']['id']]);
$mentor = $stmt_mentor->fetch();

if (!$mentor) {
    $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Profil de mentor non trouvé.'];
    header('Location: ../dashboard-mentor.php#sessions');
    exit();
}
$idMentorAnimateur = $mentor['idMentor'];

// 3. Prepare and Execute Database Insertion
$sql = "INSERT INTO Session (titreSession, dateSession, heureSession, statutSession, idMentorAnimateur)
        VALUES (?, ?, ?, 'en_attente', ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $titreSession,
        $dateSession,
        $heureSession,
        $idMentorAnimateur
    ]);

    $_SESSION['flash_message'] = ['type' => 'success', 'message' => 'Session publiée avec succès! Elle est maintenant visible pour les étudiants.'];

} catch (PDOException $e) {
    error_log("Session Publish Error: " . $e->getMessage());
    $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Une erreur est survenue lors de la publication.'];
}

header('Location: ../dashboard-mentor.php#sessions');
exit();