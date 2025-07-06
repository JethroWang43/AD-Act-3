<?php
require_once __DIR__ . '/envSetter.util.php';

try {
    $dsn = sprintf(
        'pgsql:host=%s;port=%s;dbname=%s',
        $pgConfig['host'],
        $pgConfig['port'],
        $pgConfig['db']
    );

    $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('❌ Database connection failed: ' . $e->getMessage());
}
