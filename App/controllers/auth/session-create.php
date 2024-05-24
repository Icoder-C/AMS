<?php

use Core\App;
use Core\Database;


$errors = [];
$username;
$password;

// dd($_SERVER);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    $db = App::resolve(Database::class);

    $user = $db->query('SELECT * FROM users WHERE email= :email', [
        'email' => $username
    ])->find();

    if (empty($user)) {
        $errors['feedback'] = 'Username Incorrect';
        return require controller('auth/sign-in', [
            'errors' => $errors
        ]);
        exit();
    }
    if (!password_verify($password, $user['password'])) {
        $errors['feedback'] = 'Password Incorrect';


        return require controller('auth/sign-in', [
            'errors' => $errors
        ]);
        exit();
    }

    login($user);
}
