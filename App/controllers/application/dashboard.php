<?php

$currentUser=$_SESSION['user'];
$role=$currentUser['role'];
$user=$currentUser['name'];


$dashboardLayout=view("{$role}/dashboard");
$navLayout=view("{$role}/nav");

$pageTitle='Dashboard | '.ucfirst($role);


$styles=[
    css("app/partials/nav"),
    css('app/dashboard'),
    css('app/partials/calander'),
    css('app/partials/map')  
];

$headScripts=[
    // js("index")

];
$bodyScripts=[
    // js("body/index")
];

require view("app");
