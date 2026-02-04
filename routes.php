<?php

return [
    'signup:get' => 'Auth.signup',
    'signup:post' => 'Auth.handleSignup',
    'login:get' => 'Auth.login',
    'login:post' => 'Auth.handleLogin',

    'dashboard:get' => 'User.dashboard',
    'edit-profile:get' => 'User.editProfile',
    'edit-profile:post' => 'User.updateProfile',
    'change-password:get' => 'User.changePassword',

];
