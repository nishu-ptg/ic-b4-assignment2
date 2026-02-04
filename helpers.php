<?php
function view(string $path, array $data = [], string $layout = 'main')
{
    extract($data);

//    $content = __DIR__ . "/views/{$path}.php";
    ob_start();
    require __DIR__ . "/views/{$path}.php";
    $content = ob_get_clean();

    require_once __DIR__ . "/views/layouts/{$layout}.php";
}

function route(string $name = ''): string
{
    if (empty($name)) return '/';

    return "/?route={$name}";
}

function isRoute($name): bool
{
    return CURRENT_ROUTE === $name;
}

function activeClass($name, $class = 'active'): string
{
    return isRoute($name) ? $class : '';
}

function config(string $key, $default = null)
{
    static $config = null;

    if ($config === null) {
        $config = require ROOT_PATH . '/config.php';
    }

    return $config[$key] ?? $default;
}

function db(): PDO
{
    return \App\DB::connect();
}

function redirect(string $routeName)
{
    header("Location: " . route($routeName));
    exit;
}