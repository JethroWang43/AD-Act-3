<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';
global $pgConfig;



$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$mongoConfig = [
    'uri' => $_ENV['MONGO_URI'] ?? '',
    'db' => $_ENV['MONGO_DB'] ?? '',
];

$pgConfig = [
    'host' => $_ENV['PG_HOST'] ?? '',
    'port' => $_ENV['PG_PORT'] ?? '',
    'db' => $_ENV['PG_DB'] ?? '',
    'user' => $_ENV['PG_USER'] ?? '',
    'password' => $_ENV['PG_PASSWORD'] ?? '',
];
