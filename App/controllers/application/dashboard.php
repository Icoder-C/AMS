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
    css('app/partials/map'),
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

require view("app");
