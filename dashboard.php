<?php
require_once __DIR__ . '/auth.php';
requireLogin();

$username = htmlspecialchars(
    $_SESSION['username'],
    ENT_QUOTES,
    'UTF-8'
);

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Management Portal</h1>

        <h2>Welcome, <?= $username ?>!</h2>

        <p>
            Your role:
            <strong><?= htmlspecialchars($role, ENT_QUOTES, 'UTF-8') ?></strong>
        </p>

        <nav>
            <p><a href="dashboard.php">Dashboard</a></p>

            <?php if ($role === 'admin'): ?>
                <p><a href="admin.php">Manage Students and Users</a></p>
            <?php elseif ($role === 'student'): ?>
                <p><a href="student.php">View Student Information</a></p>
            <?php endif; ?>

            <p><a href="remember.php">Manage Saved Username</a></p>
            <p><a href="logout.php">Logout</a></p>
        </nav>
    </div>
</body>
</html>