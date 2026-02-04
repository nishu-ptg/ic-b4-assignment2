<?php

namespace App\Controllers;

class UserController
{
    public function dashboard()
    {
        $user = $_SESSION['user'];

        view('user/dashboard', [
            'title' => 'Dashboard',
            'page' => [
                'header' => 'My Dashboard',
                'subHeader' => "Welcome back, {$user["name"]}!",
            ],
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