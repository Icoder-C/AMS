<?php

$currentUser=$_SESSION['user'];
$role=$currentUser['role'];
$user=$currentUser['name'];


$dashboardLayout=view("{$role}/employees/editEmpProfile");
$navLayout=view("{$role}/nav");

$pageTitle='Add Employee | '.ucfirst($role);


$styles=[
    css("app/partials/nav"),
    css('app/logic/editProfile')
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

require view("app");
