<?php

namespace App\Controllers;

class AuthController
{
    public function __construct()
    {
        if (isset($_SESSION['user_id']) && !isRoute('logout')) {
            redirect('dashboard');
        }
    }

    public function signup()
    {
        view('auth/signup', [
            'title' => 'Sign Up',
        ], 'auth');
    }

    public function handleSignup()
    {

        $input = sanitizeInput($_POST);
        $errors = $this->validateSignup($input);
//        dd($input, $errors);

        if(!empty($errors)) goBack($errors, $input);

        $hashedPassword = password_hash($input['password'], PASSWORD_DEFAULT);

        $stmt = db()->prepare("
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([
            $input['name'],
            $input['email'],
            $hashedPassword
        ]);

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
        $input = sanitizeInput($_POST);
        $errors = $this->validateLogin($input);
//        dd($errors, $input);

        if(!empty($errors)) goBack($errors, $input);

//        $stmt = db()->prepare("
//            SELECT id, email, password
//            FROM users
//            WHERE email = ?
//            LIMIT 1
//        ");
//        $stmt->execute([$input['email']]);
//        $user = $stmt->fetch();

        $user = db_query("
            SELECT id, email, password 
            FROM users 
            WHERE email = ?
            LIMIT 1
        ", [
            $input['email']
        ])->fetch();

//        dd($user);

        if (!$user || !password_verify($input['password'], $user['password'])) {
            goBack([
                'email' => ['Invalid email or password'],
            ], $input);
        }

//        $_SESSION['user'] = [
//            'id'   => $user['id'],
//            'name' => $user['name'],
//            'email'=> $user['email']
//        ];
        $_SESSION['user_id'] = $user['id'];

        redirect('dashboard');
    }

    public function logout()
    {
//        dd(__METHOD__);
        $_SESSION = [];
        session_destroy();

        redirect('login');
    }

    private function validateSignup(array $data): array
    {
        $errors = [];

        foreach (['name', 'email', 'password', 'confirm_password'] as $field) {
            if (empty($data[$field])) {
                $errors[$field][] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
            }
        }

        if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $errors['email'][] = 'Invalid email format.';
        }

        if (strlen($data['password'] ?? '') < 6) {
            $errors['password'][] = "Password must be at least 6 characters.";
        }

        if (($data['password'] ?? '') !== ($data['confirm_password'] ?? '')) {
            $errors['confirm_password'][] = "Passwords do not match.";
        }

        return $errors;
    }

    private function validateLogin(array $data): array
    {
        $errors = [];

        foreach (['email', 'password'] as $field) {
            if (empty($data[$field])) {
                $errors[$field][] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
            }
        }

        if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $errors['email'][] = 'Invalid email format.';
        }

        if (strlen($data['password'] ?? '') < 6) {
            $errors['password'][] = "Password must be at least 6 characters.";
        }

        return $errors;
    }
}