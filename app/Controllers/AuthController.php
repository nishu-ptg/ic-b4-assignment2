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
        die(__METHOD__);
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

        if (($data['password'] ?? '') !== ($data['password_confirmation'] ?? '')) {
            $errors['password_confirmation'][] = "Passwords do not match.";
        }

        return $errors;
    }
}