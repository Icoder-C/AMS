<div class="leave">
    <?php
    $statement = $db->query("SELECT COUNT(*) AS temp_requests FROM EmployeeLeave");
    $count = $statement->find()['temp_requests'];
    $perPage = 5;
    $totalPages = ceil($count / $perPage);
    $pagename="Display-leaves";
    $currentPage = getCurrentPage($totalPages,$pagename);
    $pages = generatePagination($totalPages, $currentPage);
    // dd(generatePagination($totalPages,$currentPage));
    // dd($count);
    $offSet = ($perPage * ($currentPage - 1));
    // dd( $count);
    $query = "SELECT users.name,StartDate,EndDate,LeaveType,Notes, EmployeeLeave.EmployeeID FROM EmployeeLeave INNER JOIN users ON EmployeeLeave.EmployeeID=users.EmployeeID ORDER BY StartDate ASC LIMIT $perPage OFFSET $offSet";
    $statement = $db->query($query);
    $results = $statement->findAll();
    if ($results) : ?>

        <div class="topic">
            <h1>New Employees Request</h1>
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
                        <th>Approve Request</th>
                        <th>Reject Request</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = $offSet + 1;
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['StartDate']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['EndDate']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['LeaveType']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Notes']) . "</td>";
                        echo "<td> <a href='/employees/add-employee?id=" . $row['EmployeeID'] . " '" . "class='approve'>Approve</a> </td>";
                        echo "<td> <a href='/employees/add-employee?id=" . $row['EmployeeID'] . " '" . "class='reject'>Reject</a> </td>";
                        echo "</tr>";
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="request-pagination">
            <?php require view("partials/pagination"); ?>
        </div>
    <?php else : ?>

    <?php endif; ?>
 <?php
require view("partials/adminLeaveRecord")
 ?>
</div>