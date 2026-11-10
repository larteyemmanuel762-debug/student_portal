<?php
require_once __DIR__ . '/config.php';

function requireLogin(): void
{
    if (!isset($_SESSION['username'], $_SESSION['role'])) {
        header('Location: login.php');
        exit;
    }
}

function requireRole(string $role): void
{
    requireLogin();

    if ($_SESSION['role'] !== $role) {
        http_response_code(403);
        exit('403 Forbidden: You are not authorized to access this page.');
    }
}
?>