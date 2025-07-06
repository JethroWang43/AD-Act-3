<?php
ob_start();

require_once __DIR__ . '/bootstrap.php'; // Make sure this handles session_start and constants

if (!defined('HANDLERS_PATH')) {
    define('HANDLERS_PATH', __DIR__ . '/handlers');
}
if (!defined('COMPONENTS_PATH')) {
    define('COMPONENTS_PATH', __DIR__ . '/components');
}
if (!defined('ASSESTSS_PATH')) {
    define('ASSESTSS_PATH', __DIR__ . '/assets');
}

include_once COMPONENTS_PATH . "/header.php";

echo '<div style="display: flex; gap: 32px; align-items: flex-start;">';
echo '<div style="flex: 1;">';
include_once COMPONENTS_PATH . "/calendar.php";
echo '</div>';

echo '<div style="flex: 2;">';
include_once HANDLERS_PATH . "/mongodbChecker.handler.php";
include_once HANDLERS_PATH . "/postgreChecker.handler.php";
include_once COMPONENTS_PATH . "/MeetingComponent.php";

// Define fallback functions if missing
if (!function_exists('checkMongoDBConnection')) {
    function checkMongoDBConnection() {
        return 'MongoDB status unknown (function missing)';
    }
}
if (!function_exists('checkPostgreConnection')) {
    function checkPostgreConnection() {
        return 'PostgreSQL status unknown (function missing)';
    }
}
if (!function_exists('renderMeetingComponent')) {
    function renderMeetingComponent($mongoStatusMessage, $pgsqlStatusMessage, $meetings) {
        echo "<div>Missing MeetingComponent implementation.</div>";
    }
}

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
