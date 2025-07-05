<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('HANDLERS_PATH', __DIR__ . '/handlers');
define('COMPONENTS_PATH', __DIR__ . '/components');


include_once COMPONENTS_PATH . "/header.php";
echo '<div style="display: flex; gap: 32px; align-items: flex-start;">';

// Left side: Calendar
echo '<div style="flex: 1;">';
include_once COMPONENTS_PATH . "/calendar.php";
echo '</div>';

// Right side: Meeting component and DB status
echo '<div style="flex: 2;">';
include_once HANDLERS_PATH . "/mongodbChecker.handler.php";
include_once HANDLERS_PATH . "/postgreChecker.handler.php";
include_once COMPONENTS_PATH . "/MeetingComponent.php";

$mongoStatusMessage = checkMongoDBConnection();
$pgsqlStatusMessage = checkPostgreConnection();

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

renderMeetingComponent($mongoStatusMessage, $pgsqlStatusMessage, $_SESSION['meetings'] ?? []);
echo '</div>';

echo '</div>';

include_once COMPONENTS_PATH . "/footer.php";
ob_end_flush();
?>