<?php

// dd($_POST);

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


// dd($_POST);

if($_POST['requestFor']=="DeleteEmployeeRequest"){
    $empID=$_POST['id'];
    $result=$db->query("SELECT * FROM users_temp WHERE EmployeeID=$empID")->find();
    $db->query("DELETE FROM users_temp WHERE EmployeeID=$empID");

    $_SESSION['modal'] = [
        "response" => 'Deleted Employee request of '.$result['name'].' successfully!', 
        "imagePath" => "success.svg"
        ];
        header("Location: /employees");
}


if($_POST['requestFor']=="DeleteEmployee"){
    $empID=$_POST['id'];
    $result=$db->query("SELECT * FROM users WHERE EmployeeID=$empID")->find();
    // dd([$_POST,$result]);
    $db->query("DELETE FROM users WHERE EmployeeID=$empID");

    $_SESSION['modal'] = [
        "response" => 'Deleted Employee '.$result['name'].' successfully!', 
        "imagePath" => "success.svg"
        ];
        header("Location: /employees");
}