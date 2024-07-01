<?php

use Core\Database;
use Core\Validation;
use Core\App;

$db = App::resolve(Database::class);

$currentUserID = $_SESSION['user']['EmployeeID'];
$isPhotoAdded = $_SESSION['user']['isPhotoAdded'];

$errors = [];

// dd($_POST);
if ($_POST['user'] === "employee") {

        $fname = trim($_POST['fname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST["address"]);
        $dob = trim($_POST['dob']);
        $gender = isset($_POST['gender']) ? trim($_POST['gender']) : NULL;
        $photo = isset($_FILES['image']) ? $_FILES['image'] : NULL;
        $martialStatus = isset($_POST["marital_status"]) ? trim($_POST["marital_status"]) : NULL;
        $emergencyContactPerson = trim($_POST["e_person"]);
        $emergencyPhone = trim($_POST["e_phone"]);

        // dd($maritialStatus);

        Validation::nameValidation($fname ?? NULL);
        Validation::emailValidation($email ?? NULL);
        Validation::phoneNumberValidation($phone ?? NULL);
        Validation::addressValidation($address ?? NULL);
        Validation::dateOfBirthValidation($dob ?? NULL);
        Validation::genderValidation($gender ?? NULL);


        if ($photo["size"] != 0 || !$isPhotoAdded) {
                Validation::photoFileValidation($photo);
        }

        Validation::martialStatusValidate($martialStatus ?? NULL);
        Validation::emergencyNameValidation($emergencyContactPerson ?? NULL);
        Validation::emergencyPhoneValidation($emergencyPhone ?? NULL);

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

        $filename = NULL;
        if ($photo['size'] != 0) {

                $pathinfo = pathinfo($photo['name']);

                $nameFile = str_replace(" ", "_", $fname);

                $base = $nameFile . "_" . $currentUserID;

                $filename = $base . "." . $pathinfo["extension"];

                $destination = BASE_PATH . "/public/Data/images/" . $filename;

                $fileMoved = move_uploaded_file($photo["tmp_name"], $destination);

                if (!$fileMoved) {
                        $_SESSION['modal'] = [
                                "response" => 'Failed to upload file!',
                                "imagePath" => "failure.svg"
                        ];
                        header("Location: /profile");
                        exit();
                }
        }

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
        photo_name=COALESCE(:filename,photo_name)
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
}
if ($_POST['user'] === "admin") {

        $fname = trim($_POST['fname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST["address"]);
        $dob = trim($_POST['dob']);
        $gender = isset($_POST['gender']) ? trim($_POST['gender']) : NULL;
        $photo = isset($_FILES['image']) ? $_FILES['image'] : NULL;
        $ofcname = trim($_POST['ofcName']);
        $doE = trim($_POST['doE']);
        $latitude = trim($_POST['latitude']);
        $longitude = trim($_POST['longitude']);


        Validation::nameValidation($fname ?? NULL);
        Validation::emailValidation($email ?? NULL);
        Validation::phoneNumberValidation($phone ?? NULL);
        Validation::addressValidation($address ?? NULL);
        Validation::dateOfBirthValidation($dob ?? NULL);
        Validation::genderValidation($gender ?? NULL);

        // dd($photo);


        if ($photo["size"] != 0 || !$isPhotoAdded) {
                Validation::photoFileValidation($photo);
        }
        Validation::ofcNameValidation($ofcname ?? NULL);
        Validation::dateOfEstdValidation($doE ?? NULL);
        Validation::latitudeValidation($latitude ?? NULL);
        Validation::longitudeValidation($longitude ?? NULL);

        $errors = Validation::getErrors();

        if (!empty($errors)) {
                return require controller(
                        'application/employees/editProfile',
                        [
                                'errors' => $errors
                        ]
                );
        }
        $filename = NULL;
        if ($photo['size'] != 0) {

                $pathinfo = pathinfo($photo['name']);

                $nameFile = str_replace(" ", "_", $fname);

                $base = $nameFile . "_" . $currentUserID;

                $filename = $base . "." . $pathinfo["extension"];

                $destination = BASE_PATH . "/public/Data/images/" . $filename;

                $fileMoved = move_uploaded_file($photo["tmp_name"], $destination);

                if (!$fileMoved) {
                        $_SESSION['modal'] = [
                                "response" => 'Failed to upload file!',
                                "imagePath" => "failure.svg"
                        ];
                        header("Location: /profile");
                        exit();
                }
        }


        $query = "UPDATE users
                SET name= :fname,
                email=:email,
                phone_number=:phone,
                address=:address,
                DOB=:dob,
                gender=:gender,
                photo_name=COALESCE(:filename,photo_name)
                WHERE EmployeeID=:EmployeeID";

        $db->query($query, [
                'fname' => $fname,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'dob' => $dob,
                'gender' => $gender,
                "filename" => $filename,
                "EmployeeID" => $currentUserID
        ]);

        $query_2 = "UPDATE  office
                SET OfficeName=:ofcName,
                DateOfEstablishment=:doE,
                Latitude=:latitude,
                Longitude=:longitude
                WHERE officeID=1";

        $stmt = $db->query($query_2, [
                "ofcName" => $ofcname,
                "doE" => $doE,
                "latitude" => $latitude,
                "longitude" => $longitude
        ]);
        // dd($stmt);

        $_SESSION['modal'] = [
                "response" => 'Changes Saved Successfully!',
                "imagePath" => "success.svg"
        ];
}

$checks = profileCompleteCheck($currentUserID);
$_SESSION['user']["isProfileComplete"] = $checks["isProfileComplete"];
$_SESSION['user']["isPhotoAdded"] = $checks["isPhotoAdded"];
// dd($_SESSION);
header("Location: /profile");
