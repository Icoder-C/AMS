<?php

use Core\App;
use Core\Database;

$currentUser=$_SESSION['user'];
$role=$currentUser['role'];
$user=$currentUser['name'];


$dashboardLayout=view("{$role}/employees");
$navLayout=view("{$role}/nav");

$pageTitle='Employees | '.ucfirst($role);


$styles=[
    css("app/partials/nav"),
    css('app/partials/calander'),
    css('app/employees')
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

$db=App::resolve(Database::class);

require view("app");
