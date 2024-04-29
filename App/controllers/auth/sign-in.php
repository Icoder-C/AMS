<?php
$mainLayoutContent=view("auth/sign-in");
$pageTitle='Sign IN | AMS';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
}

$styles=[
    css("auth/sign-in")
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
