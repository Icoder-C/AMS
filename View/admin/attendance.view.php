<?php
$currentDate = date('Y-m-d');
$searchName = '%' . ($_GET['EmployeeName'] ?? '') . '%';
// $startDate = ($_GET['start'] ?? '') ? $_GET['start'] : '1800-12-12';
// $startDate = $_GET['start'] ?? NULL;
// $endDate = ($_GET['end'] ?? '') ? $_GET['end'] : $currentDate;
// $endDate =( $_GET['end']) ?? NULL;
$startDate = !empty($_GET['start']) ? $_GET['start'] : NULL;
$endDate = !empty($_GET['end']) ? $_GET['end'] : NULL;


$statement = $db->query(
    "SELECT COUNT(*) AS temp_count
    FROM Attendance 
    INNER JOIN users 
    ON Attendance.EmployeeID=users.EmployeeID 
    WHERE LOWER(name) LIKE :name
            AND (:startDate IS NULL OR AttendanceDate >= :startDate)
            AND (:endDate IS NULL OR AttendanceDate <= :endDate)",
    ["name" => $searchName,
    "startDate" => $startDate, 
    "endDate" => $endDate]
);
$count = $statement->find()['temp_count'];
$perPage = 30;
$totalPages = ceil($count / $perPage);
$pagename = "View_Attendance";
$currentPage = getCurrentPage($totalPages, $pagename);
$pages = generatePagination($totalPages, $currentPage);

// $offSet = ($perPage * ($currentPage - 1));
$offSet = max(0, $perPage * ($currentPage - 1));


$query ="SELECT AttendanceDate, users.name AS name, CheckInTime, CheckOutTime, Attendance.Status AS Status
          FROM Attendance 
          INNER JOIN users 
          ON Attendance.EmployeeID=users.EmployeeID 
          WHERE LOWER(name) LIKE :name
            AND (:startDate IS NULL OR AttendanceDate >= :startDate)
            AND (:endDate IS NULL OR AttendanceDate <= :endDate)
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
                    <th>Remarks</th>
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
    <div class="displayPagination">
        <?php require view("partials/pagination"); ?>
    </div>
</div>