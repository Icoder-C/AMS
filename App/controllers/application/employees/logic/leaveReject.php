<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$leaveID=$_GET['id'];
$result=$db->query("SELECT * FROM EmployeeLeave INNER JOIN users USING (EmployeeID) WHERE LeaveID=:leaveID",[
    "leaveID"=>$leaveID
])->find();

$query="UPDATE EmployeeLeave SET Status='Approved' WHERE LeaveID=:leaveID";
echo $result['LeaveType']." approved of ". $result['name'];

// dd($result);

$db->query($query,[
    "leaveID"=>$leaveID
]);


$_SESSION['modal']=[
    "response"=>$result['LeaveType']." rejected of ". $result['name'],
    "imagePath"=>"failure.svg"
];
header("location: /leave");