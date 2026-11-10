<?php
require_once __DIR__ . '/config.php';

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}

exit;
?>
