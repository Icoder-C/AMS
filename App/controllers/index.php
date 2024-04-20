<?php
$mainLayoutContent=view("index");
$pageTitle='Attendance Management System (A.M.S.)';

$styles=[
    css("landing/index")
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

require view("mainLayout");