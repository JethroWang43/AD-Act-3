<?php

declare(strict_types=1);

// 1) Composer autoload
require 'vendor/autoload.php';

// 2) Composer bootstrap
require 'bootstrap.php';

// 3) envSetter
if (!defined('UTILS_PATH')) {
    define('UTILS_PATH', __DIR__);
}
require_once UTILS_PATH . '/envSetter.util.php';
// ——— PostgreSQL Configuration ———
$pgConfig = [
    'host' => 'localhost',
    'port' => '5555',
    'db'   => 'calendardb',   // Change this
    'user' => 'user',        // Change this
    'pass' => 'password',        // Change this
];

// ——— Connect to PostgreSQL ———
try {
    $dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
    $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "Connected to PostgreSQL successfully.\n";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage() . "\n");
}

// ——— Apply schema from SQL file ———
echo "Applying schema from database/user.model.sql…\n";

$sql = file_get_contents('database/user.model.sql');

if ($sql === false) {
    throw new RuntimeException("Could not read database/user.model.sql\n");
} else {
    $pdo->exec($sql);
    echo "Creation success from database/user.model.sql\n";
}

// ——— Truncate target tables ———
echo "Truncating tables…\n";

foreach (['users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}

echo "Reset complete.\n";
