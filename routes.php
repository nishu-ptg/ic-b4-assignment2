<?php

return [
    // AuthController
    'signup:get' => 'Auth.signup',
    'signup:post' => 'Auth.handleSignup',
    'login:get' => 'Auth.login',
    'login:post' => 'Auth.handleLogin',
    'logout:post' => 'Auth.logout',

    // UserController
    'dashboard:get' => 'User.dashboard',
    'edit-profile:get' => 'User.editProfile',
    'edit-profile:post' => 'User.updateProfile',
    'change-password:get' => 'User.changePassword',
    'change-password:post' => 'User.updatePassword',

];
