<?php

use Core\Database;
use Core\Validation;
use Core\App;

$db = App::resolve(Database::class);

// $currentUserID = $_SESSION['user']['EmployeeID'];

$errors = [];

// dd($_POST);
$empID = trim($_POST['id']);
$fname = trim($_POST['fname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST["address"]);
$dob = trim($_POST['dob']);
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : NULL;
$martialStatus = isset($_POST["marital_status"]) ? trim($_POST["marital_status"]) : NULL;
$emergencyContactPerson = trim($_POST["e_person"]);
$emergencyPhone = trim($_POST["e_phone"]);
$department = trim($_POST['department']);
$position = trim($_POST['position']);
$doa = trim($_POST['doa']);
$checkIn = trim($_POST['checkIn']);
$checkOut = trim($_POST['checkOut']);
$rate = trim($_POST['rate']);
$supervisor = trim($_POST['supervisor']);

// dd($maritialStatus);

Validation::nameValidation($fname ?? NULL);
Validation::emailValidation($email ?? NULL);
Validation::phoneNumberValidation($phone ?? NULL);
Validation::addressValidation($address ?? NULL);
Validation::dateOfBirthValidation($dob ?? NULL);
Validation::genderValidation($gender ?? NULL);
Validation::martialStatusValidate($martialStatus ?? NULL);
Validation::emergencyNameValidation($emergencyContactPerson ?? NULL);
Validation::emergencyPhoneValidation($emergencyPhone ?? NULL);
Validation::departmentValidation($department ?? NULL);
Validation::positionValidation($position ?? NULL);
Validation::dateOfAppointmentValidation($doa ?? NULL);
Validation::checkInTimeValidation($checkIn ?? NULL);
Validation::checkOutTimeValidation($checkOut ?? NULL);
Validation::basicRateValidation($rate ?? NULL);
Validation::supervisorValidation($supervisor ?? NULL);

$errors = Validation::getErrors();
// dd([$_POST,$photo, $errors]);

if (!empty($errors)) {
    $_SESSION['errors-edit-emp'] = $errors;
    header("Location: /employees/edit-employees-profile?id=$empID");
}

// dd($_POST);

$query = "UPDATE users
        SET name = :fname,
            email = :email,
            phone_number = :phone,
            address = :address,
            DOB = :dob,
            gender = :gender,
            maritial_status = :maritalStatus,
            emergency_contact_person = :emergencyContactPerson,
            emergency_contact = :emergencyPhone,
            department = :department,
            position = :position,
            appointment_date = :doa,
            checkIn = :checkIn,
            checkOut = :checkOut,
            rate = :rate,
            supervisor = :supervisor
        WHERE EmployeeID = :EmployeeID";

$params = [
    'fname' => $fname,
    'email' => $email,
    'phone' => $phone,
    'address' => $address,
    'dob' => $dob,
    'gender' => $gender,
    'maritalStatus' => $martialStatus,
    'emergencyContactPerson' => $emergencyContactPerson,
    'emergencyPhone' => $emergencyPhone,
    'department' => $department,
    'position' => $position,
    'doa' => $doa,  // Ensure the key here matches the placeholder in the query
    'checkIn' => $checkIn,
    'checkOut' => $checkOut,
    'rate' => $rate,
    'supervisor' => $supervisor,
    'EmployeeID' => $empID
];

$db->query($query, $params);


$_SESSION['modal'] = [
    "response" => 'Changes Saved Successfully!',
    "imagePath" => "success.svg"
];

header("Location: /employees/view-profile?id=$empID");
