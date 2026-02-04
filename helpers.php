<?php
function view($path, $data = [], $layout = 'main')
{
    extract($data);

    $content = __DIR__ . "/views/{$path}.php";

    require_once __DIR__ . "/views/layouts/{$layout}.php";
}