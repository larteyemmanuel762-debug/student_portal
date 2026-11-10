<?php
require_once __DIR__ . '/auth.php';
requireRole('admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Administrator Dashboard</h1>

        <p class="success">
            Access granted. You are logged in as an administrator.
        </p>

        <h2>Administration Menu</h2>
        <ul>
            <li>Register students (future feature)</li>
            <li>View student records (future feature)</li>
            <li>Manage users (future feature)</li>
        </ul>

        <p><a href="dashboard.php">Back to Dashboard</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>