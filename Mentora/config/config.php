<?php

// FIX: Start session only once, here.
// This must be the very first thing executed.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database credentials
$host = 'localhost';
$dbname = 'mentora';
$user = 'root';
$pass = '';

// Establish DB connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // In a real production environment, you should log this error, not die().
    // error_log("Database Connection Error: " . $e->getMessage());
    die("Erreur: Impossible de se connecter à la base de données. Veuillez réessayer plus tard.");
}

/**
 * Sanitizes data for safe HTML output to prevent XSS attacks.
 * @param mixed $data The data to sanitize.
 * @return string The sanitized data.
 */
function sanitize($data) {
    return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8');
}

/**
 * Generates the correct image path for a user's profile picture.
 * Handles both full URLs and local file names.
 *
 * IMPORTANT: This function assumes it's being called from a file within a `/pages` or `/includes` directory.
 * The path '../' goes up one level to the project root.
 *
 * @param string|null $photoUrl The value from the database.
 * @return string The web-accessible path to the image.
 */
function get_profile_image_path($photoUrl) {
    // If the path is a full URL (like from unsplash), use it directly.
    if (filter_var($photoUrl, FILTER_VALIDATE_URL)) {
        return htmlspecialchars($photoUrl);
    }
    
    // Define the server path and web path to the uploads directory.
    // __DIR__ gives the directory of *this* file (e.g., /path/to/project/config)
    $server_path_to_uploads = __DIR__ . '/../assets/uploads/';
    $web_path_to_uploads = '../assets/uploads/';
    
    // If it's a local file, check if it exists in the uploads directory.
    if (!empty($photoUrl) && file_exists($server_path_to_uploads . $photoUrl)) {
        return $web_path_to_uploads . htmlspecialchars($photoUrl);
    }

    // Otherwise, return the path to the default avatar.
    return '../assets/images/default_avatar.png';
}

?>