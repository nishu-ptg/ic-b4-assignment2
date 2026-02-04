<?php

namespace App\Controllers;

class AuthController
{
    public function signup()
    {
        view('auth/signup', [
            'title' => 'Sign Up',
        ], 'auth');
    }

    public function handleSignup()
    {
//        echo '<pre>'; print_r($_POST); die();
        $name     = trim($_POST['name'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = db()->prepare("
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([$name, $email, $hashedPassword]);

        redirect("login");
    }

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
}