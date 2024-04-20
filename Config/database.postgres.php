<?php
// Replace these values with your actual PostgreSQL connection details
$host = "localhost";
$port = "5432";
$dbname = "AMS";
$user = "postgres";
$password = "1111";

// Connect to the PostgreSQL database
$dbconn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check if the connection was successful
if (!$dbconn) {
    echo "Error: Unable to connect to database.\n";
} else {
    echo "Connected to database successfully.\n";
    
    // Prepare and execute the SQL query
    $result = pg_query($dbconn, "SELECT * FROM users");
    
    // Fetch all rows as an associative array
    $users = pg_fetch_all($result);

    // Output the users
    if ($users) {
        echo "<ul>";
        foreach ($users as $user) {
            echo "<li>" . $user['name'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No users found.";
    }

    // Close the database connection
    pg_close($dbconn);
}

