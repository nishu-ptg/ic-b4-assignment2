<?php

namespace App\Controllers;

class AuthController
{
    public function login()
    {
        $content = __DIR__ . '/../../views/auth/login.php';

        require __DIR__ . '/../../views/layouts/auth.php';
    }

    public function handleLogin()
    {
        die(__METHOD__);
    }

    public function signup()
    {
        $content = __DIR__ . '/../../views/auth/signup.php';

        require __DIR__ . '/../../views/layouts/auth.php';
    }
}