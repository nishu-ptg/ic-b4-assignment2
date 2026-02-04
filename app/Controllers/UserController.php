<?php

namespace App\Controllers;

class UserController
{
    protected $user;

    public function __construct()
    {
        $id = $_SESSION['user_id'] ?? null;
        if (!$id) redirect('login');

        $this->user = db_query("
                SELECT id, name, email 
                FROM users 
                WHERE id = ? 
                LIMIT 1
            ", [$id])
            ->fetch();

        if (!$this->user) { // what happened? user deleted??
            unset($_SESSION['user_id']);
            redirect('login');
        }
    }
    public function dashboard()
    {
        $user = $this->user;

        view('user/dashboard', [
            'title' => 'Dashboard',
            'page' => [
                'header' => 'My Dashboard',
                'subHeader' => "Welcome back, {$user["name"]}!",
            ],
            'user' => $user,
        ]);
    }

    public function editProfile()
    {
        view('user/edit-profile', [
            'title' => 'Edit Profile',
            'page' => [
                'header' => 'Edit Profile',
                'subHeader' => 'Update your personal information',
            ],
            'user' => $this->user,
        ]);
    }

    public function updateProfile()
    {
        $input = sanitizeInput($_POST);
        $errors = $this->validateUpdateProfile($input);

        if (!empty($errors)) goBack($errors, $input);

        db_query("
                UPDATE users 
                SET name = ?, email = ? 
                WHERE id = ?
            ", [
                $input['name'],
                $input['email'],
                $this->user['id']
            ]);

        redirect('dashboard');
    }

    public function changePassword()
    {
        view('user/change-password', [
            'title' => 'Change Password',
            'page' => [
                'header' => 'Change Password',
                'subHeader' => 'Ensure your account is secure',
            ],
        ]);
    }

    public function updatePassword()
    {
        $input = sanitizeInput($_POST);
        $errors = $this->validateUpdatePassword($input);
//        dd($errors, $input);

        if (!empty($errors)) goBack($errors, $input);

        $newPassword = password_hash($input['password'], PASSWORD_DEFAULT);

        db_query("
                UPDATE users 
                SET password = ? 
                WHERE id = ?
            ", [
                $newPassword,
                $this->user['id']
            ]);

        redirect('dashboard');
    }

    private function validateUpdateProfile(array $data): array
    {
        $errors = [];

        foreach (['name', 'email'] as $field) {
            if (empty($data[$field])) {
                $errors[$field][] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
            }
        }

        if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $errors['email'][] = 'Invalid email format.';
        }

        return $errors;
    }

    private function validateUpdatePassword(array $data): array
    {
        $errors = [];

        foreach (['current_password', 'new_password', 'confirm_new_password'] as $field) {
            if (empty($data[$field])) {
                $errors[$field][] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
            }
        }

        if (strlen($data['new_password'] ?? '') < 6) {
            $errors['new_password'][] = "Password must be at least 6 characters.";
        }

        if (($data['new_password'] ?? '') !== ($data['confirm_new_password'] ?? '')) {
            $errors['confirm_new_password'][] = "Passwords do not match.";
        }

        return $errors;
    }
}