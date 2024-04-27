<?php

use Core\Validation;

// dd($_SERVER);

if($_SERVER['REQUEST_METHOD']==='POST'){
    Validation::nameValidation(trim($_POST['fname'])?? NULL);
    Validation::emailValidation(trim($_POST['email'])?? NULL);
    Validation::dateOfAppointmentValidation(trim($_POST['doa'])?? NULL);
    Validation::passwordValidation(trim($_POST['password'])?? NULL);
    Validation::confirmPasswordValidation(trim($_POST['password']), trim($_POST['cpassword'])?? NULL);

    $errors=Validation::getErrors();
}

$mainLayoutContent=view("auth/sign-up");
$pageTitle='Sign UP | AMS';

$styles=[
    css("auth/sign-up")
];

$headScripts=[
    // [
    //     "src"=>'https://code.jquery.com/jquery-3.7.1.min.js',
    //     "integrity"=>"sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=",
    //     "crossorigin"=>"anonymous"
    // ],
    // js("index")

];
$bodyScripts=[
    // js("body/index")
];

require view("mainLayout");