<?php

use Core\App;
use Core\Database;
use Core\Validation;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['EmployeeID'];

$errors = [];
$leave_type = [
    "annual_leave" => "Annual Leave",
    "casual_leave" => "Casual Leave",
    "sick_leave" => "Sick Leave",
    "wedding_leave" => "Wedding Leave",
    "mourn_leave" => "Mourn Leave",
    "paternity_leave" => "Paternity Leave",
    "ethnic_leave" => "Ethnic Festival Leave",
    "exam_leave" => "Examination Leave",
    "maternity_leave" => "Maternity Leave"
];


$startDate = trim($_POST['start_date']);
$endDate = trim($_POST['end_date']);
$type = trim($_POST['leave_type']);
$reason = trim($_POST['reason']);

Validation::startDateValidation($startDate ?? NULL);
Validation::endDateValidation($startDate ?? NULL, $endDate ?? NULL);
Validation::leaveValidation($type ?? NULL);
Validation::longTextValidation($reason ?? NULL);

$errors = Validation::getErrors();

// dd($errors);

if (!empty($errors)) {
    return require controller(
        "/application/employees/applyLeave",
        [
            "errors" => $errors
        ]
    );
}

$db->query(
    "INSERT INTO EmployeeLeave(EmployeeID, LeaveType, StartDate, EndDate, Notes, Status) 
    VALUE(:EmployeeID, :LeaveType, :StartDate, :EndDate, :Notes, :Status)",
    [
        "EmployeeID" => $currentUserId,
        "LeaveType" => $leave_type[$type],
        "StartDate" => $startDate,
        "EndDate" => $endDate,
        "Notes" => $reason,
        "Status" => "Pending"
    ]
);
$_SESSION['modal']=[
    "response"=>'Leave applied successfully.',
    "imagePath"=>"success.svg"
];

header("Location: /leave");
