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
        ]);
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
}