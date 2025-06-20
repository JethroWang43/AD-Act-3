<?php
ob_start();

if (!defined('HANDLERS_PATH')) {
    define('HANDLERS_PATH', __DIR__ . '/handlers');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once HANDLERS_PATH . "/mongodbChecker.handler.php";
include_once HANDLERS_PATH . "/postgreChecker.handler.php";

 // should be true


$mongoStatusMessage = checkMongoDBConnection();
$pgsqlStatusMessage = checkPostgreConnection();

// Handle form POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $time = trim($_POST['time'] ?? '');

    if ($title && $date && $time) {
        if (!isset($_SESSION['meetings']) || !is_array($_SESSION['meetings'])) {
            $_SESSION['meetings'] = [];
        }

        $_SESSION['meetings'][] = [
            'title' => $title,
            'date' => $date,
            'time' => $time
        ];
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meeting Calendar</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Meeting Calendar</h1>

        <div class="status-box"><?= htmlspecialchars($mongoStatusMessage) ?></div>
        <div class="status-box"><?= htmlspecialchars($pgsqlStatusMessage) ?></div>

        <form method="POST" action="">
            <input type="text" name="title" placeholder="Meeting Title" required>
            <input type="date" name="date" required>
            <input type="time" name="time" required>
            <button type="submit">Add Meeting</button>
        </form>

        <div class="meeting-list">
            <h2>Upcoming Meetings</h2>
            <?php if (!empty($_SESSION['meetings'])): ?>
                <?php foreach ($_SESSION['meetings'] as $meeting): ?>
                    <div class="meeting">
                        <div class="meeting-title"><?= htmlspecialchars($meeting['title']) ?></div>
                        <div class="meeting-time"><?= htmlspecialchars($meeting['date']) ?> at <?= htmlspecialchars($meeting['time']) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No meetings scheduled.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="/assets/script.js"></script>
</body>
</html>
