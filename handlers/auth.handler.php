<?php
declare(strict_types=1);

require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/database.php'; // ✅ Add this line


Auth::init();

if ($_GET['action'] === 'login') {
    $username = trim($_POST['login_username'] ?? '');
    $password = $_POST['login_password'] ?? '';

    if (Auth::login($pdo, $username, $password)) {
        header('Location: /index.php');
        exit;
    } else {
        header('Location: /pages/Login/login.php?error=invalid');
        exit;
    }
}

if ($_GET['action'] === 'logout') {
    Auth::logout();
    header('Location: /pages/Login/index.php?message=loggedout');
    exit;
}

if ($_GET['action'] === 'check') {
    header('Content-Type: application/json');
    echo json_encode(['loggedIn' => Auth::check()]);
    exit;
}
