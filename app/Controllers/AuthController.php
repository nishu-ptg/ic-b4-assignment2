<?php

namespace App\Controllers;

class AuthController
{
    public function login()
    {
        view('auth/login', [
            'title' => 'Login',
        ], 'auth');
    }

    public function handleLogin()
    {
        die(__METHOD__);
    }

    public function signup()
    {
        view('auth/signup', [
            'title' => 'Sign Up',
        ], 'auth');
    }
}