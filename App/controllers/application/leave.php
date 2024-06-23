<?php

$currentUser=$_SESSION['user'];
$role=$currentUser['role'];
$user=$currentUser['name'];

use Core\App;
use Core\Database;

$dashboardLayout=view("{$role}/leave");
$navLayout=view("{$role}/nav");

$pageTitle='Leave | '.ucfirst($role);


$styles=[
    css("app/partials/nav"),
    css('app/partials/calander'),
    css('app/leave'),
    // css('app/report')
];

$headScripts=[
    // js("index")

];
$bodyScripts=[
    // js("body/index")
];


$db=App::resolve(Database::class);



require view("app");
