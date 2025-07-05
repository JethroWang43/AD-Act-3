<?php

// Define the path to the components directory
if (!defined('COMPONENTS_PATH')) {
    define('COMPONENTS_PATH', __DIR__ . '../components');
}

function head() {
    include_once COMPONENTS_PATH . '/header.php';
}

function footer() {
    include_once COMPONENTS_PATH . '/footer.php';
}

function layoutWrapStart() {
    echo '<div style="display: flex; gap: 32px; align-items: flex-start;">';
}

function layoutWrapEnd() {
    echo '</div>';
}

function startSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function loadEnvironment(): array {
    return [
        'pgHost' => getenv('PGHOST') ?: 'localhost',
        'pgPort' => getenv('PGPORT') ?: '5432',
        'pgUser' => getenv('PGUSER') ?: 'postgres',
        'pgPassword' => getenv('PGPASSWORD') ?: '',
        'pgDB' => getenv('PGDATABASE') ?: 'postgres',
    ];
}
