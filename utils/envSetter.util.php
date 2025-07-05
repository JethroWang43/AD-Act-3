<?php

// Define BASE_PATH only if not already defined
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/../');
}

require_once BASE_PATH . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

return [
    'mongo' => [
        'uri' => $_ENV['MONGO_URI'],
        'db'  => $_ENV['MONGO_DB'],
    ],
    'postgres' => [
        'host'     => $_ENV['POSTGRES_HOST'],
        'port'     => $_ENV['POSTGRES_PORT'],
        'db'       => $_ENV['POSTGRES_DB'],
        'user'     => $_ENV['POSTGRES_USER'],
        'password' => $_ENV['POSTGRES_PASSWORD'],
    ],
];