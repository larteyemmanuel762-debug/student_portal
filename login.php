<?php
require_once __DIR__ . '/config.php';

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

$rememberedUsername = $_COOKIE['preferred_username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (
        isset($users[$username]) &&
        password_verify($password, $users[$username]['password'])
    ) {
        // Prevent session fixation.
        session_regenerate_id(true);

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];

        // Remember the username for seven days.
        if ($remember) {
            setcookie('preferred_username', $username, [
                'expires' => time() + (7 * 86400),
                'path' => '/',
                'secure' => !empty($_SERVER['HTTPS'])
                    && $_SERVER['HTTPS'] !== 'off',
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
        } else {
            setcookie('preferred_username', '', [
                'expires' => time() - 3600,
                'path' => '/',
                'secure' => !empty($_SERVER['HTTPS'])
                    && $_SERVER['HTTPS'] !== 'off',
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
        }

        header('Location: dashboard.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Management Portal</h1>
        <h2>Login</h2>

        <?php if ($error !== ''): ?>
            <p class="error">
                <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= htmlspecialchars($rememberedUsername, ENT_QUOTES, 'UTF-8') ?>"
                required
                autocomplete="username"
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <label class="checkbox-label">
                <input type="checkbox" name="remember" value="1">
                Remember username for 7 days
            </label>

            <button type="submit">Login</button>
        </form>

        <p class="hint">
            Admin: admin / Admin@123
        </p>
        <p class="hint">
            Student: student1 / Student@123
        </p>

        <p>
            <a href="remember.php">Manage saved username</a>
        </p>
    </div>
</body>
</html>