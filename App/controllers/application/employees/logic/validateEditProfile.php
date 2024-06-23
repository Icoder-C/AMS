<?php

use Core\Database;
use Core\Validation;
use Core\App;

$db = App::resolve(Database::class);

$currentUserID = $_SESSION['user']['EmployeeID'];

$errors = [];

$fname = trim($_POST['fname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST["address"]);
$dob = trim($_POST['dob']);
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : NULL;
$martialStatus = isset($_POST["marital_status"]) ? trim($_POST["marital_status"]) : NULL;
$emergencyContactPerson = trim($_POST["e_person"]);
$emergencyPhone = trim($_POST["e_phone"]);
$photo = isset($_FILES['image']) ? $_FILES['image'] : NULL;

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
Validation::photoFileValidation($photo);

$errors = Validation::getErrors();
// dd([$_POST,$photo, $errors]);

if (!empty($errors)) {
        return require controller(
                'application/employees/editProfile',
                [
                        'errors' => $errors
                ]
        );
}

$pathinfo = pathinfo($photo['name']);

$nameFile = str_replace(" ", "_", $fname);

$base = $nameFile . "_" . $currentUserID;

$filename = $base . "." . $pathinfo["extension"];
// dd([$filename, $nameFile, $fname]);

// $filename=$photo["name"];

$destination = BASE_PATH . "/public/Data/images/" . $filename;


if (move_uploaded_file($photo["tmp_name"], $destination)) {
        $query = "UPDATE users
        SET name= :fname,
        email=:email,
        phone_number=:phone,
        address=:address,
        DOB=:dob,
        gender=:gender,
        maritial_status=:martialStatus,
        emergency_contact_person=:emergencyContactPerson,
        emergency_contact=:emergencyPhone,
        photo_name=:filename
        WHERE EmployeeID=:EmployeeID";

        $db->query($query, [
                'fname' => $fname,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'dob' => $dob,
                'gender' => $gender,
                'martialStatus' => $martialStatus,
                'emergencyContactPerson' => $emergencyContactPerson,
                'emergencyPhone' => $emergencyPhone,
                "filename" => $filename,
                "EmployeeID" => $currentUserID
        ]);
        $_SESSION['modal'] = [
                "response" => 'Changes Saved Successfully!',
                "imagePath" => "success.svg"
        ];
        header("Location: /profile");
}
