<?php
require_once __DIR__ . '/config.php';

// Clear all session variables.
$_SESSION = [];

// Delete the session cookie using its current parameters.
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(session_name(), '', [
        'expires' => time() - 42000,
        'path' => $params['path'],
        'domain' => $params['domain'],
        'secure' => $params['secure'],
        'httponly' => $params['httponly'],
        'samesite' => $params['samesite'] ?? 'Lax'
    ]);
}

// Destroy the server-side session.
session_destroy();

header('Location: login.php');
exit;
?>