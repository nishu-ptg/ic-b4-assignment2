<?php
session_start();
define('ROOT_PATH', __DIR__ . '/..');
define('CURRENT_ROUTE', $_GET['route'] ?? 'dashboard');

require_once ROOT_PATH . '/vendor/autoload.php';
require_once ROOT_PATH . '/helpers.php';

$routes = require_once ROOT_PATH . '/routes.php';

dispatch($routes, CURRENT_ROUTE, $_SERVER['REQUEST_METHOD']);