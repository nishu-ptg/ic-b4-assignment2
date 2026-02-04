<?php

return [
    'login:get' => 'Auth.login',
    'login:post' => 'Auth.handleLogin',
    'signup:get' => 'Auth.signup',

    'dashboard:get' => 'User.dashboard',
    'edit-profile:get' => 'User.editProfile',
    'change-password:get' => 'User.changePassword',

];
