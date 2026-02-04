<?php

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../routes.php';

// $route = $_GET['route'] ?? 'dashboard';
define('CURRENT_ROUTE', $_GET['route'] ?? 'dashboard');
$method = strtolower($_SERVER['REQUEST_METHOD']);
// $key = "$route:$method";
$key = CURRENT_ROUTE . ":$method";

if (array_key_exists($key, $routes)) {
    [$controllerName, $action] = explode('.', $routes[$key]);

    $controllerClass = "App\\Controllers\\" . $controllerName . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        $controller->$action();
    } else {
        die("Error: Controller class $controllerClass not found.");
    }
} else {
    http_response_code(404);
    die("404 - Not found. <!-- '{$key}' -->");
}