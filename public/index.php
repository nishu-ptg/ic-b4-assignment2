<?php

require_once __DIR__ . '/../vendor/autoload.php';

$route = $_GET['route'] ?? 'dashboard';
$method = strtolower($_SERVER['REQUEST_METHOD']);

$routes = [
    'dashboard:get' => 'User.dashboard',
    'login:get'     => 'Auth.login',
    'login:post'    => 'Auth.handleLogin',
    'signup:get'    => 'Auth.signup',
];

$key = "$route:$method";

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