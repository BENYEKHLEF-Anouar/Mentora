<?php
/**
 * Sanitizes data to prevent XSS attacks.
 * @param mixed $data Input data (string or array).
 * @return mixed Sanitized data.
 */
function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8');
}

/**
 * Retrieves the web path to a user’s profile image, checking if the file exists on the server.
 * @param string|null $photoUrl Filename of the uploaded photo from the database.
 * @return string Full web path to the image for use in an <img src> tag.
 */
function get_profile_image_path($photoUrl) {
    // Define the server's file system path to the uploads directory.
    // __DIR__ gives the absolute path to the current file's directory (e.g., /var/www/html/mentora/config)
    $server_path_to_uploads = __DIR__ . '/../assets/uploads/';

    // Define the relative web path that the browser will use.
    // This is relative to the files in the 'pages' directory.
    $web_path_to_uploads = '../assets/uploads/';
    $default_web_path = '../assets/images/default_avatar.png';

    // Check if a photo URL is provided, it's not the default, and the file ACTUALLY EXISTS on the server.
    if (!empty($photoUrl) && $photoUrl !== 'default_avatar.png' && file_exists($server_path_to_uploads . $photoUrl)) {
        // If it exists, return the WEB PATH for the browser.
        return $web_path_to_uploads . htmlspecialchars($photoUrl);
    }

    // Otherwise, return the path to the default avatar.
    return $default_web_path;
}


/**
 * Generates a CSRF token for form security.
 * @return string Random token stored in session.
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Validates a CSRF token from a form submission.
 * @param string $token Submitted token.
 * @return bool True if valid, false otherwise.
 */
function validate_csrf_token($token) {
    if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        unset($_SESSION['csrf_token']);
        return true;
    }
    return false;
}

/**
 * Logs errors to the server log.
 * @param string $message Error message to log.
 */
function log_error($message) {
    error_log($message);
}
?>