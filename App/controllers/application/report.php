<?php

use Core\App;
use Core\Database;

$currentUser=$_SESSION['user'];
$role=$currentUser['role'];
$user=$currentUser['name'];


$dashboardLayout=view("{$role}/report");
$navLayout=view("{$role}/nav");

$pageTitle='Report | '.ucfirst($role);


$styles=[
    css("app/partials/nav"),
    css('app/report') 
];

$headScripts=[
    // [
    //     "src"=>'https://code.jquery.com/jquery-3.7.1.min.js',
    //     "integrity"=>"sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=",
    //     "crossorigin"=>"anonymous"
    // ],
    // // js("index")
    // [
    //     "src"=>"https://unpkg.com/leaflet/dist/leaflet.js"
    // ]

];
$bodyScripts=[
    // js("body/index")
];

$db=App::resolve(Database::class);

require view("app");
