<?php
require_once __DIR__ . '/config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete the remembered username cookie.
    setcookie('preferred_username', '', [
        'expires' => time() - 3600,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS'])
            && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    unset($_COOKIE['preferred_username']);

    $message = 'Saved username cookie has been deleted.';
}

$hasCookie = isset($_COOKIE['preferred_username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Saved Username</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Saved Username</h1>

        <?php if ($message !== ''): ?>
            <p class="success">
                <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php elseif ($hasCookie): ?>
            <p>A username cookie is currently saved.</p>
        <?php else: ?>
            <p>No saved username cookie was found.</p>
        <?php endif; ?>

        <?php if ($hasCookie): ?>
            <form method="POST" action="remember.php">
                <button type="submit">Delete Saved Username</button>
            </form>
        <?php endif; ?>

        <p><a href="login.php">Back to Login</a></p>
        <p><a href="dashboard.php">Dashboard</a></p>
    </div>
</body>
</html>