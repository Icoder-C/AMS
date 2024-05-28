<?php
$currentUserID = $_SESSION['user']["EmployeeID"];
$searchName = '%' . ($_GET['EmployeeName'] ?? '') . '%';
// $startDate = ($_GET['start'] ?? '') ? $_GET['start'] : '1800-12-12';
$startDate = $_GET['start'] ?? NULL;
// $endDate = ($_GET['end'] ?? '') ? $_GET['end'] : '3000-12-12';
$endDate = $_GET['end'] ?? NULL;


$statement = $db->query(
    "SELECT COUNT(*) AS temp_count
    FROM Attendance 
    INNER JOIN users 
    ON Attendance.EmployeeID=users.EmployeeID 
    WHERE LOWER(name) LIKE :name",
    ["name" => $searchName]
);

$count = $statement->find()['temp_count'];
$perPage = 30;
$totalPages = ceil($count / $perPage);
$pagename = "View_Attendance";
$currentPage = getCurrentPage($totalPages, $pagename);
$pages = generatePagination($totalPages, $currentPage);

$offSet = ($perPage * ($currentPage - 1));


$query = "SELECT AttendanceDate, users.name AS name, CheckInTime, CheckOutTime 
            FROM Attendance 
            INNER JOIN users 
            ON Attendance.EmployeeID=users.EmployeeID 
            WHERE LOWER(name) LIKE :name AND
                COALESCE(AttendanceDate>=:startDate,1)
                AND
                COALESCE(AttendanceDate<=:endDate,1)
            ORDER BY users.name ASC, AttendanceDate DESC
            LIMIT $perPage OFFSET $offSet";

$statement = $db->query($query, [
    "name" => $searchName,
    "startDate" => $startDate, 
    "endDate" => $endDate
]);
$results = $statement->findAll();
?>
<div class="attend">
    <div class="topic">
        <h1>Attendance Record</h1>
    </div>
    <div class="search">
        <form method="GET">
            <input type="text" name="EmployeeName" id="EmployeeName" placeholder="Employee Name">
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