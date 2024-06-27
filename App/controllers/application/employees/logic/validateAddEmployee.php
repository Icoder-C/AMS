<?php

// dd($_POST);


use Core\Database;
use Core\Validation;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];


$empID = trim($_POST['id']);
$fname = trim($_POST['fname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);

$department=trim($_POST['department']);
$position=trim($_POST['position']);
$doa=trim($_POST['doa']);
$checkIn=trim($_POST['checkIn']);
$checkOut=trim($_POST['checkOut']);
$rate=trim($_POST['rate']);
$supervisor=trim($_POST['supervisor']);

// dd($maritialStatus);

Validation::departmentValidation($department??NULL);
Validation::positionValidation($position??NULL);
Validation::dateOfAppointmentValidation($doa??NULL);
Validation::checkInTimeValidation($checkIn??NULL);
Validation::checkOutTimeValidation($checkOut??NULL);
Validation::basicRateValidation($rate??NULL);
Validation::nameValidation($supervisor ?? NULL);

$errors = Validation::getErrors();
// dd([$_POST,$errors]);

if (!empty($errors)) {
        $_SESSION['errors-addemp']=$errors;
        header("Location: /employees/add-employee?id=$empID");
        // return require controller(
        //         'application/employees/addEmployees',
        //         [
        //                 'errors' => $errors
        //         ]
        // );
}

$result=$db->query("SELECT * FROM users_temp WHERE EmployeeID=$empID")->find();

// dd($result);


$query = "INSERT INTO users(name, email, phone_number, password, department, position, appointment_date, checkIn, checkOut, rate, supervisor) VALUE(:name, :email, :phone, :password, :department, :position, :doa, :checkIn, :checkOut, :rate, :supervisor)";

$db->query($query, [
'name' => $result['name'],
'email' => $result['email'],
'phone' => $result['phone_number'],
'password'=>$result['password'],
'department'=>$department,
'position'=>$position,
'doa'=>$doa,
'checkIn'=>$checkIn,
'checkOut'=>$checkOut,
'rate'=>$rate,
'supervisor'=>$supervisor
]);

$db->query("DELETE FROM users_temp WHERE EmployeeID=$empID");

$_SESSION['modal'] = [
"response" => 'Addeded Employee '.$result['name'].'!', 
"imagePath" => "success.svg"
];
header("Location: /employees");