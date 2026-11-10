<?php
// Configure session cookies before starting the session.
ini_set('session.use_strict_mode', '1');

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => !empty($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] !== 'off',
    'httponly' => true,
    'samesite' => 'Lax'
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Sample users for classroom practice.
$users = [
    'admin' => [
        'password' => password_hash(
            'Admin@123',
            PASSWORD_DEFAULT
        ),
        'role' => 'admin'
    ],
    'student1' => [
        'password' => password_hash(
            'Student@123',
            PASSWORD_DEFAULT
        ),
        'role' => 'student'
    ]
];
?>