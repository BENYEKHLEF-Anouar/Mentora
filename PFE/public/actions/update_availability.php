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
    header('HTTP/1.1 403 Forbidden');
    die("Accès refusé.");
}
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Erreur de validation CSRF.");
}

$idUtilisateur = $_SESSION['user']['id'];
$days_of_week = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
$submitted_slots = $_POST['slots'] ?? [];

try {
    $pdo->beginTransaction();

    // Delete old availability for this user
    $stmt = $pdo->prepare("DELETE FROM Disponibilite WHERE idUtilisateur = ?");
    $stmt->execute([$idUtilisateur]);

    // Insert new availability
    $stmt_insert = $pdo->prepare(
        "INSERT INTO Disponibilite (jourSemaine, heureDebut, heureFin, idUtilisateur) VALUES (?, ?, ?, ?)"
    );

    foreach ($days_of_week as $day) {
        if (!empty($submitted_slots[$day])) {
            foreach ($submitted_slots[$day] as $time) {
                // Assuming time slots are always 1 hour for this grid
                $heureDebut = $time . ':00';
                $heureFin = date('H:i:s', strtotime($heureDebut . ' +1 hour'));
                $stmt_insert->execute([$day, $heureDebut, $heureFin, $idUtilisateur]);
            }
        }
    }

    $pdo->commit();

    $_SESSION['feedback'] = ['type' => 'success', 'message' => 'Disponibilités mises à jour avec succès.'];

} catch (PDOException $e) {
    $pdo->rollBack();
    error_log("Update availability error: " . $e->getMessage());
    $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Une erreur est survenue lors de la mise à jour.'];
}

header('Location: ../dashboard-mentor.php#disponibilites');
exit;