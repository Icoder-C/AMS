<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$leaveID=$_GET['id'];
$result=$db->query("SELECT * FROM EmployeeLeave INNER JOIN users USING (EmployeeID) WHERE LeaveID=:leaveID",[
    "leaveID"=>$leaveID
])->find();

$query="UPDATE EmployeeLeave SET Status='Approved' WHERE LeaveID=:leaveID";

$empID=$result['EmployeeID'];
$status=$result['LeaveType'];

$startDate = new DateTime($result['StartDate']);
$endDate = new DateTime($result['EndDate']);
$interval = new DateInterval('P1D'); // 1 Day interval

$datePeriod = new DatePeriod($startDate, $interval, $endDate->add($interval));
// dd($result);

foreach ($datePeriod as $date) {
    $days=$date->format('Y-m-d');
    $query="INSERT INTO Attendance(EmployeeID, AttendanceDate, Status) VALUES(:EmployeeID, :date, :status)";

    $db->query($query,[
        "EmployeeID"=>$empID,
        "date"=>$days,
        "status"=>$status
    ]);
}

// dd($result);

// $db->query($query,[
//     "leaveID"=>$leaveID
// ]);

die();
$_SESSION['modal']=[
    "response"=>$result['LeaveType']." approved of ". $result['name'],
    "imagePath"=>"success.svg"
];
header("location: /leave");