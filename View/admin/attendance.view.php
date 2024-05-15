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
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Worked Hours</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $statement = $db->query("SELECT * FROM EmployeeTimeSheet");
                $results = $statement->findAll();
                if ($results) {
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['S_N']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Check_In']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Check_Out']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Worked_Hours']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Location']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>