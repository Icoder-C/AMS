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
    css('app/attendance')
];

$headScripts=[

    // js("index")

];
$bodyScripts=[
    // js("body/index")
];

$db=App::resolve(Database::class);

require view("app");
