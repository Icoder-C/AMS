<div class="employees">
    <?php
    $statement = $db->query("SELECT * FROM users_temp");
    $results = $statement->findAll();
    if ($results): ?>  

        <div class="request">
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
                        $i=1;
                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']??NULL) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']??NULL) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone_number']??NULL) . "</td>";
                            echo "<td>" . htmlspecialchars($row['appointment_date']??NULL) . "</td>";
                            echo "<td> <a href='/employees/add-employee?id=" . $row['user_id'] ." '" . "class='approve'>Approve</a> </td>";
                            echo "<td> <a href='/employees/add-employee?id=" . $row['user_id'] ." '" ."class='reject'>Reject</a> </td>";
                            echo "</tr>";
                            $i= $i+1;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    <?php else: ?>
       
    <?php endif; ?>
    <div class="Employees">
            <div class="topic">
                <h1>Employees</h1>
            </div>
            <div class="cards">
                <div class="card">
                    
                </div>
            </div>
</div>
