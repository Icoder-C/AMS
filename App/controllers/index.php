<?php

$mainLayoutContent=view("index");
$pageTitle='Attendance Management System (A.M.S.)';

$styles=[
    css("landing/index")
];

$headScripts=[
 
    // js("index")

];
$bodyScripts=[
    js("body/index")
];

require view("mainLayout");