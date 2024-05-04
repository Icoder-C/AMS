<?php

$currentUser=$_SESSION['user'];
$role=$currentUser['role'];
$user=$currentUser['name'];

use Core\App;
use Core\Database;

$dashboardLayout=view("{$role}/attendance");
$navLayout=view("{$role}/nav");

$pageTitle='Attendance | '.ucfirst($role);


$styles=[
    css("app/partials/nav"),
    css('app/partials/calander'),
    css('app/partials/map'),
    css('app/attendance'),
    [
        "href"=>"https://unpkg.com/leaflet/dist/leaflet.css"
    ]  
];

$headScripts=[
    [
        "src"=>'https://code.jquery.com/jquery-3.7.1.min.js',
        "integrity"=>"sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=",
        "crossorigin"=>"anonymous"
    ],
    // js("index")
    [
        "src"=>"https://unpkg.com/leaflet/dist/leaflet.js"
    ]

];
$bodyScripts=[
    // js("body/index")
];

$db=App::resolve(Database::class);

require view("app");
