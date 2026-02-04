<?php

namespace App\Controllers;

class UserController
{
    public function dashboard()
    {
        view('user/dashboard');
    }

    public function editProfile()
    {
        view('user/edit-profile');
    }

    public function changePassword()
    {
        view('user/change-password');
    }
}