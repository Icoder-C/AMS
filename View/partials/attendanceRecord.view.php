<?php
$currentUserID = $_SESSION['user']["EmployeeID"];

$statement = $db->query("SELECT COUNT(*) AS temp_count FROM Attendance WHERE EmployeeID=$currentUserID");
$count = $statement->find()['temp_count'];
$perPage = 8;
$totalPages = ceil($count / $perPage);
$pagename="Display_Attendance";
$currentPage = getCurrentPage($totalPages,$pagename);
$pages = generatePagination($totalPages, $currentPage);

$offSet = ($perPage * ($currentPage - 1));

$query = "SELECT AttendanceDate, users.name AS name, CheckInTime, CheckOutTime 
            FROM Attendance 
            INNER JOIN users 
            ON Attendance.EmployeeID=users.EmployeeID 
            WHERE Attendance.EmployeeID=$currentUserID
            ORDER BY AttendanceDate DESC, users.name ASC
            LIMIT $perPage OFFSET $offSet";

$statement = $db->query($query);
$results = $statement->findAll();
?>
<div class="report">
    <div class="topic">
        <h1>Attendance Record</h1>
    </div>
    <div class="search">
        <form action="/searchRecord" method="POST">
            <input type="text" name="EmployeeName" id="EmployeeName" hidden value="<?= $_SESSION['user']['name'] ?>">
            <input type="date" name="start" id="start">
            <span>to</span>
            <input type="date" name="end" id="end">
            <button type="submit">Search</button>
        </form>
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
                    <!-- <th>Location</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($results) {
                    $i = $offSet + 1;
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . htmlspecialchars($row['AttendanceDate']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . convertTimeFormat(htmlspecialchars($row['CheckInTime'])) . "</td>";
                        echo "<td>" . convertTimeFormat(htmlspecialchars($row['CheckOutTime'])) . "</td>";
                        echo "<td>" . WorkedHours(convertTimeFormat(htmlspecialchars($row['CheckInTime'])), convertTimeFormat(htmlspecialchars($row['CheckOutTime']))) . "</td>";
                        // echo "<td>" . htmlspecialchars($row['Location']) . "</td>";
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
    <div class="displayPagination">
        <?php require view("partials/pagination"); ?>
    </div>
</div>