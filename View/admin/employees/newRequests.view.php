<?php
$statement = $db->query("SELECT COUNT(*) AS temp_user_count FROM users_temp");
$count = $statement->find()['temp_user_count'];
$perPage = 5;
$totalPages = ceil($count / $perPage);
$currentPage = getCurrentPage($totalPages);
$pages = generatePagination($totalPages, $currentPage);
// dd(generatePagination($totalPages,$currentPage));
// dd($count);
$offSet = ($perPage * ($currentPage - 1));
// dd( $count);
$query = "SELECT * FROM users_temp LIMIT $perPage OFFSET $offSet";
$statement = $db->query($query);
$results = $statement->findAll();
if ($results) : ?>

    <!-- <div class="request"> -->
    <div class="topic">
        <h1>New Employees Request</h1>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Employee Name</th>
                    <th>Email ID</th>
                    <th>Phone Number</th>
                    <th>Date of Appointment</th>
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
                    echo "<td>" . htmlspecialchars($row['name'] ?? NULL) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email'] ?? NULL) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone_number'] ?? NULL) . "</td>";
                    echo "<td>" . htmlspecialchars($row['appointment_date'] ?? NULL) . "</td>";
                    echo "<td> <a href='/employees/add-employee?id=" . $row['user_id'] . " '" . "class='approve'>Approve</a> </td>";
                    echo "<td> <a href='/employees/add-employee?id=" . $row['user_id'] . " '" . "class='reject'>Reject</a> </td>";
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