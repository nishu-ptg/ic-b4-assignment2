<?php
function view(string $path, array $data = [], string $layout = 'main')
{
    extract($data);

//    $content = __DIR__ . "/views/{$path}.php";
    ob_start();
    require __DIR__ . "/views/{$path}.php";
    $content = ob_get_clean();

    require_once __DIR__ . "/views/layouts/{$layout}.php";

    unset($_SESSION['_errors']);
    unset($_SESSION['_old']);
    unset($_SESSION['_flash']);
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

function db_query(string $sql, array $params = []): PDOStatement
{
    $stmt = db()->prepare($sql);
    $stmt->execute($params);
    return $stmt;
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
    dump(...$vars);
    die();
}

function errorMsg(string $field, string $class = 'text-red-500 text-sm m-1'): string
{
    $msg = error($field);

    if (empty($msg)) return '';

    return "<p class='{$class}'>{$msg}</p>";
}

//function flash(string $key, string $message)
//{
//    $_SESSION['_flash'][$key] = $message;
//}

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

function icon(string $key): string {
    $icons = [
        'user' => '<svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                        />
                    </svg>',
        'email' => '<svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                        />
                    </svg>',
        'lock' => '<svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"
                        />
                    </svg>',
    ];

    return $icons[$key] ?? '';
}

function inputField(array $options): void
{
    $field = array_merge([
        'name' => '',
        'label' => '',
        'type' => 'text',
        'placeholder' => '',
        'iconKey' => '',
        'value' => null,
    ], $options);

    $field['icon'] = $field['iconKey'] ? icon($field['iconKey']) : '';

    include __DIR__ . '/views/_input.php';
}




