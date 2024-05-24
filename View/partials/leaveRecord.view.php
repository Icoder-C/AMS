<?php
$currentUserID = $_SESSION['user']["EmployeeID"];

$statement = $db->query("SELECT COUNT(*) AS temp_count FROM EmployeeLeave WHERE EmployeeID=$currentUserID");
$count = $statement->find()['temp_count'];
$perPage = 8;
$totalPages = ceil($count / $perPage);
$currentPage = getCurrentPage($totalPages);
$pages = generatePagination($totalPages, $currentPage);

$offSet = ($perPage * ($currentPage - 1));

$query = "SELECT users.name AS name,StartDate,EndDate,LeaveType,Notes
            FROM EmployeeLeave 
            INNER JOIN users 
            ON EmployeeLeave.EmployeeID=users.EmployeeID 
            WHERE EmployeeLeave.EmployeeID=$currentUserID
            ORDER BY users.name ASC, StartDate DESC
            LIMIT $perPage OFFSET $offSet";

$statement = $db->query($query);
$results = $statement->findAll();
?>

<div class="topic">
    <h1>Leave Record</h1>
    <div class="search">
        <form action="#" method="post">
            <input type="text" name="EmployeeName" id="EmployeeName" hidden value="<?= $_SESSION['user']['name'] ?>">
            <input type="text" name="year" id="year" value="<?= date('Y') ?>">
            <button type="submit">Search</button>
        </form>
    </div>
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>StartDate</th>
                <th>EndDate</th>
                <th>LeaveType</th>
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
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['StartDate']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['EndDate']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['LeaveType']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Notes']) . "</td>";
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