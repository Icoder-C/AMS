<?php

$currentUserID=$_SESSION['user']["EmployeeID"];

// $statement = $db->query("SELECT COUNT(*) AS temp_count FROM Attendance WHERE EmployeeID=$currentUserID");
// $count = $statement->find()['temp_count'];
// $perPage = 8;
// $totalPages = ceil($count / $perPage);
// $pagename="View_Attendance";
// $currentPage = getCurrentPage($totalPages,$pagename);
// $pages = generatePagination($totalPages, $currentPage);

// $offSet = max(0, $perPage * ($currentPage - 1));

$query = "SELECT AttendanceDate, users.name AS name, CheckInTime, CheckOutTime, Attendance.Status AS Status
            FROM Attendance 
            INNER JOIN users 
            ON Attendance.EmployeeID=users.EmployeeID 
            WHERE Attendance.EmployeeID=$currentUserID
            ORDER BY users.name ASC, AttendanceDate DESC
            LIMIT 10";

$statement = $db->query($query);
$results = $statement->findAll();
?>

<div class="attend">
    <div class="body">
        <div class="card">
            <div class="con">
                <?php require view("partials\calander"); ?>
            </div>
        </div>
        <div class="card">
            <?php require view("partials\map"); ?>
        </div>
    </div>

    <div class="form-container">
        <div class="forms-input">
            <form action="/check-in" method="post">
                <button type="submit">Check In</button>
            </form>
        </div>
        <div class="forms-input">
            <form action="/check-out" method="post">
                <button type="submit">Check Out</button>
            </form>
        </div>
    </div>

    <div class="topic">
        <h1>Attendance Record</h1>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Worked Hours</th>
                    <th>Status</th>
                    <!-- <th>Location</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($results) {
                    $i =1;
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . htmlspecialchars($row['AttendanceDate']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . convertTimeFormat(htmlspecialchars($row['CheckInTime'])) . "</td>";
                        echo "<td>" . convertTimeFormat(htmlspecialchars($row['CheckOutTime'])) . "</td>";
                        echo "<td>" . WorkedHours($row['CheckInTime'], $row['CheckOutTime']) . "</td>";
                        // echo "<td>" .'<a class= \'locationLink\' href="https://www.google.com/maps?q=' . htmlspecialchars($row['latitude']) . ',' . htmlspecialchars($row['longitude']) . '" target="_blank">Open Location in Google Maps</a>'."</td>";
                        echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                        echo "</tr>";
                        $i += 1;
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="list-pagination">
        <//?php require view("partials/pagination"); ?>
    </div> -->
</div>