<?php

use Core\Database;
use Core\Validation;
use Core\App;

$db=App::resolve(Database::class);

$errors = [];

$fname = trim($_POST['fname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST["address"]);
$dob = trim($_POST['dob']);
$gender = isset($_POST['gender'])?trim($_POST['gender']):NULL;
$martialStatus = isset($_POST["married_status"])?trim($_POST["married_status"]):NULL;
$emergencyContactPerson = trim($_POST["e_person"]);
$emergencyPhone = trim($_POST["e_phone"]);



Validation::nameValidation($fname ?? NULL);
Validation::emailValidation($email ?? NULL);
Validation::phoneNumberValidation($phone ?? NULL);
Validation::addressValidation($address??NULL);
Validation::dateOfBirthValidation($dob ?? NULL);
Validation::genderValidation($gender??NULL);
Validation::martialStatusValidate($martialStatus??NULL);
Validation::emergencyNameValidation($emergencyContactPerson??NULL);
Validation::emergencyPhoneValidation($emergencyPhone??NULL);

$errors=Validation::getErrors();
// dd([$_POST, $errors]);

if(!empty($errors)){
    return require controller('application/employees/editProfile',
    ['errors'=>$errors
]);
}

$query="UPDATE Attendance 
        SET name= :fname,
        email=:status,
        phone_number=:phone,
        address=:address,
        DOB=:dob,
        gender=:gender,
        maritial_status=:maritialStatus,
        emergency_contact_person=:emergencyContactPerson,
        emergency_contact=:emergencyPhone
        WHERE EmployeeID=:EmployeeID";

$db->query($query, [
        'fname'=>$fname,
        'phone'=>$phone,
        'address'=>$address,
        'dob'=>$dob,
        'gender'=>$gender,
        'maritialStatus'=>$maritialStatus,
        'emergencyContactPerson'=>$emergencyContactPerson,
        'emergencyPhone'=>$emergencyPhone
]);