<?php
use Core\App;
use Core\Database;

$user=$currentUser['name'];

$currentUserID=$_SESSION['user']['EmployeeID'];

// dd($_SESSION);
$response = $_SESSION['modal']['response']?? NULL;
$image = $_SESSION['modal']['imagePath']?? NULL; 
$output = $_SESSION['modal']['output']?? NULL; 

require view("partials/modal");

$db = App::resolve(Database::class);

$query="SELECT * FROM Attendance WHERE EmployeeID=:EmployeeID AND AttendanceDate=:date";
$currentDate=date('Y-m-d');
$result=$db->query($query,[
    "EmployeeID"=>$currentUserID,
    "date"=>$currentDate
])->find();

// dd($result);
$dataToday=$result??NULL;

// dd($dataToday);

?>
<div class="main-container">

    <div class="notification-bar">
        <h1>Welcome <?= $user ?> !!!</h1>
        <div class="sub-headings">
            <div class="dynamic-content">
                <?php if ($dataToday) : ?>
                    <li>
                        <div class="checkin">Current Status: <?= $dataToday['Status']??NULL ?></div>
                    </li>
                    <li>
                        <div class="checkin">Checked In Time: <?= convertTimeFormat($dataToday['CheckInTime'])??NULL ?></div>
                    </li>
                    <li>
                        <div class="checkin">Checed Out Time: <?= convertTimeFormat($dataToday['CheckOutTime'])??NULL ?></div>
                    </li>
                <?php endif; ?>
            </div>
            <div class="date-time">
                <span id="time"></span>
                <span id="date"></span>
                <script src="<?= js('date-time') ?>"></script>
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="forms-input">
            <form action="/check-in" method="post">
                <input type="hidden" name="latitude" id="latitudeIn">
                <input type="hidden" name="longitude" id="longitudeIn">
                <button type="submit">Check In</button>
            </form>
        </div>
        <div class="forms-input">
            <form action="/check-out" method="post">
            <input type="hidden" name="latitude" id="latitudeOut">
            <input type="hidden" name="longitude" id="longitudeOut">
                <button type="submit">Check Out</button>
            </form>
        </div>
        <div class="forms-input">
            <form action="/leave-apply" method="post">
                <button type="submit">Apply Leave</button>
            </form>
        </div>
        <script src="<?= js("getLocation")?>"></script>
    </div>

    <div class="body">
        <div class="card">
            <?php require view("partials\calander"); ?>
        </div>
        <div class="card">
            <?php require view("partials\map"); ?>
        </div>
    </div>
</div>