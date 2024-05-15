<div class="report">
    <div class="topic">
        <h1>Attendance Record</h1>
    </div>
    <div class="search">
        <form action="#" method="post">
            <input type="date" name="start" id="start">
            <span>to</span>
            <input type="date" name="start" id="start">
            <button type="submit">Search</button>
        </form>
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
    <div class="topic">
        <h1>Leave Record</h1>
        <div class="search">
            <form action="#" method="post">
                <input type="text" name="year" id="year">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</div>