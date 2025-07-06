<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__));
}
if (!defined('UTILS_PATH')) {
    define('UTILS_PATH', BASE_PATH . '/utils');
}
if (!defined('COMPONENTES_PATH')) {
    define('COMPONENTES_PATH', BASE_PATH . '/components');
}
if (!defined('DUMMIES_PATH')) {
    define('DUMMIES_PATH', BASE_PATH . '/staticDatas/dummies');
}

chdir(BASE_PATH);

require_once BASE_PATH . '/vendor/autoload.php';
