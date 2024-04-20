<?php
$dashboardLayout=view("user/dashboard");

$pageTitle='Dashboard | Admin';


$styles=[
    css("nav")
];

$headScripts=[
    [
        "src"=>'https://code.jquery.com/jquery-3.7.1.min.js',
        "integrity"=>"sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=",
        "crossorigin"=>"anonymous"
    ],
    // js("index")

];
$bodyScripts=[
    js("body/index")
];

require view("partials/dashboardLayout");
