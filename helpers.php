<?php
function view(string $path, array $data = [], string $layout = 'main')
{
    $normalize = fn($str) => str_replace(['\\', '.'], '/', $str);

    $viewPath = $normalize($path);
    $viewFile = ROOT_PATH . "/views/{$viewPath}.php";

    if (!file_exists($viewFile)) abort(500, "View {$viewPath} not found");

    extract($data);

    ob_start();
    require $viewFile;
    $content = ob_get_clean();

    $layoutPath = $normalize($layout);
    $layoutFile = ROOT_PATH . "/views/layouts/{$layoutPath}.php";

    if (!file_exists($layoutFile)) abort(500, "Layout {$layoutPath} not found");

    require_once __DIR__ . "/views/layouts/{$layout}.php";

    unset($_SESSION['_errors'], $_SESSION['_old']);
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
        $configFile = ROOT_PATH . '/config.php';

        if (!file_exists($configFile)) abort(500, "Config file not found");

        $config = require $configFile;
    }

    return $config[$key] ?? $default;
}

function db(): PDO
{
    return \App\DB::connect();
}

function db_query(string $sql, array $params = []): PDOStatement
{
    try {
        $stmt = db()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        abort(500, $e->getMessage());
    }
}

function redirect(string $routeName)
{
    header("Location: " . route($routeName));
    exit;
}

function sanitizeInput($data)
{
    return is_array($data)
        ? array_map(fn($item) => sanitizeInput($item), $data)
        : (is_string($data) ? trim($data) : $data);
}

function goBack(array $errors = [], array $old = [])
{
    $_SESSION['_errors'] = $errors;
    $_SESSION['_old'] = $old;

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function old(string $field, string $default = ''): string
{
    return e($_SESSION['_old'][$field] ?? $default);
}

function error(string $field): string
{
    return $_SESSION['_errors'][$field][0] ?? '';
}

function dump(...$vars): void
{
    foreach ($vars as $var) {
        echo '<pre style="background: #222; color: #dd0; padding: 8px; margin: 8px 0;">';
            print_r($var);
        echo '</pre>';
    }
}

function dd(...$vars): void
{
    dump(...$vars); die();
}

function errorMsg(string $field, string $class = 'text-red-500 text-sm m-1'): string
{
    $msg = error($field);

    return empty($msg) ? '' : "<p class='{$class}'>{$msg}</p>";
}

function flash(string $key, string $message = null): ?string
{
    // disclaimer: generated using AI

    // 1. SETTING MODE: If a message is passed, store it and stop.
    if ($message !== null) {
        $_SESSION['_flash'][$key] = $message;
        return null;
    }

    // 2. GETTING MODE: If no message is passed, try to retrieve it.
    if (isset($_SESSION['_flash'][$key])) {
        $message = $_SESSION['_flash'][$key];

        // 3. THE "FLASH" MAGIC: Delete it from the session immediately.
        unset($_SESSION['_flash'][$key]);

        // Return the escaped message so it's safe to print.
        return e($message);
    }

    return null;
}

function icon(string $name): string
{
    $path = __DIR__ . "/views/icons/{$name}.svg";

    return file_exists($path) ? file_get_contents($path) : '';
}

function inputField(array $options): void
{
    $field = array_merge([
        'name' => '',
        'label' => '',
        'labelRight' => '',
        'type' => 'text',
        'placeholder' => '',
        'iconKey' => '',
        'value' => null,
    ], $options);

    $field['icon'] = $field['iconKey'] ? icon($field['iconKey']) : '';

    include __DIR__ . '/views/_input.php';
}

function validateRequired(array $data, array $fields): array
{
    return array_reduce($fields, function ($errors, $field) use ($data) {
        if (empty($data[$field])) {
            $label = ucwords(str_replace('_', ' ', $field));

            $errors[$field][] = "{$label} is required.";
        }
        return $errors;
    }, []);
}

function dispatch(array $routes, string $path, string $method)
{
    $method = strtolower($method);
    $key = "{$path}:{$method}";

    if (!isset($routes[$key])) {
        if (isset($routes[$path]) && $method === 'get') {
            $key = $path;
        } else {
            abort(404);
        }
    }

    [$controller, $action] = explode('.', $routes[$key]);
    $className = "App\\Controllers\\{$controller}Controller";

    if (!class_exists($className)) {
        abort(500, "Undefined Controller '{$className}'.");
    }

    $instance = new $className();
    if (!method_exists($instance, $action)) {
        abort(500, "Action '{$action}' not defined in '{$className}'.");
    }

    $instance->$action();
}

function abort(int $code = 500, string $message = ''): void
{
    http_response_code($code);

    if(empty($message) && $code === 404) $message = 'Not Found';

    require ROOT_PATH . '/views/error.php';
    exit;
}




