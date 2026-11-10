<?php
require_once __DIR__ . '/auth.php';
requireRole('student');

$username = htmlspecialchars(
    $_SESSION['username'],
    ENT_QUOTES,
    'UTF-8'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Dashboard</h1>

        <p class="success">
            Welcome, <?= $username ?>!
        </p>

        <p>You have permission to access student information.</p>

        <h2>Student Menu</h2>
        <ul>
            <li>View profile (future feature)</li>
            <li>View results (future feature)</li>
            <li>View courses (future feature)</li>
        </ul>

        <p><a href="dashboard.php">Back to Dashboard</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>