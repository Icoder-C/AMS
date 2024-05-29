<div class="report">
    <?php
    $searchName = '%' . ($_GET['EmployeeName'] ?? '') . '%';
    $searchYear = !empty($_GET['year']) ? $_GET['year'] : NULL;
    $statement = $db->query("SELECT COUNT(*) AS temp_count 
                            FROM EmployeeLeave 
                            INNER JOIN users 
                            ON EmployeeLeave.EmployeeID=users.EmployeeID 
                            WHERE EmployeeLeave.Status <>'Pending'
                            AND LOWER(name) LIKE :searchName
                            AND (:searchYear IS NULL OR YEAR(StartDate)=:searchYear)", 
                            [
                            "searchName" => $searchName,
                            "searchYear" => $searchYear
                            ]);
    $count = $statement->find()['temp_count'];
    $perPage = 8;
    $pagename = "Display_leave_records";

    $totalPages = ceil($count / $perPage);
    $currentPage = getCurrentPage($totalPages, $pagename);
    $pages = generatePagination($totalPages, $currentPage);

    $offSet = max(0, $perPage * ($currentPage - 1));

    $query = "SELECT users.name AS name,StartDate,EndDate,LeaveType,Notes
            FROM EmployeeLeave 
            INNER JOIN users 
            ON EmployeeLeave.EmployeeID=users.EmployeeID 
            WHERE EmployeeLeave.Status <>'Pending'
                AND LOWER(name) LIKE :searchName
                AND (:searchYear IS NULL OR YEAR(StartDate)=:searchYear)
            ORDER BY users.name ASC, StartDate DESC
            LIMIT $perPage OFFSET $offSet";

    $statement = $db->query($query, [
        "searchName" => $searchName,
        "searchYear" => $searchYear
    ]);
    $results = $statement->findAll();
    ?>

    <div class="topic">
        <h1>Leave Record</h1>
    </div>
    <div class="search">
        <form method="GET">
            <input type="text" name="EmployeeName" id="EmployeeName">
            <input type="number" name="year" id="year" value="">
            <button type="submit">Search</button>
        </form>
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
    <div class="request-pagination">
        <?php require view("partials/pagination"); ?>
    </div>
</div>