<?php

use Core\App;
use Core\Database;
use Core\Validation;


$errors = [];

$fname = trim($_POST['fname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$doa = trim($_POST['doa']);
$password = trim($_POST['password']);
$cpassword = trim($_POST['cpassword']);
//Validates the user inputs and stores the errors in the $error array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Validation::nameValidation($fname ?? NULL);
    Validation::emailValidation($email ?? NULL);
    Validation::phoneNumberValidation($phone ?? NULL);
    Validation::dateOfAppointmentValidation($doa ?? NULL);
    Validation::passwordValidation($password);
    Validation::confirmPasswordValidation($password, $cpassword);
}
$errors = Validation::getErrors();

//if validator error then redirects to the sign-up page and returns error array to the sign up page
if (!empty($errors)) {
    return require controller('auth/sign-up', [
        'errors' => $errors
    ]);
}

//check if a user with the same email id exists in the database

$role;

$db = App::resolve(Database::class);
$ifAny = $db->query('SELECT email FROM users')->find();  

//check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email=:email', [
    'email' => $email
])->find();

$unverified_user = $db->query('SELECT * FROM users_temp WHERE email=:email', [
    'email' => $email
])->find();


$password = password_hash($password, PASSWORD_BCRYPT);

//Check if there is a user with the same email, if yes then redirect to the sign-in page
if ($user) {
    $errors['feedback'] = 'Account with this email already exists. LOGIN!!';
    return require controller('auth/sign-in', [
        'error' => $errors
    ]);
    exit();
}
else if($unverified_user){
    abort(403);
}
//if there is no user existing then store it in database
else {
    $db->query('INSERT INTO users_temp(name,email,phone_number,appointment_date,password) VALUES(:name,:email,:phone_number,:appointment_date,:password)', [
        'name' => $fname,
        'email' => $email,
        'phone_number' => $phone,
        'appointment_date' => $doa,
        'password' => $password
    ]);
}
return require controller('index');

//mark that the user has logged in.
// $currentUser = $db->query('SELECT * FROM users WHERE email= :email',
//     [
//         'email'=>$email
//     ])->find();

// login($currentUser);
