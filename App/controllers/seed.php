<?php

// Assuming $db is the database connection instance
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Array of sample names
$names = [
    "Roshan Phuyal",
    "Suresh Adhikari",
    "Rita Shrestha",
    "Nabin Gautam",
    "Anita Sharma",
    "Ramesh Maharjan",
    "Shila Karki",
    "Hari Bhandari",
    "Sarita Regmi",
    "Krishna Thapa",
    "Gita Acharya",
    "Rajesh Nepal",
    "Sita Basnet",
    "Prakash Oli",
    "Uma KC",
    "Dinesh Tamang",
    "Muna Rai",
    "Bibek Singh",
    "Nisha Lama",
    "Deepak Subedi",
    "Ashmita Bista"
];

// Array of sample emails
$emails = [
    "admin@gmail.com",
    "suresh@example.com",
    "rita@example.com",
    "nabin@example.com",
    "anita@example.com",
    "ramesh@example.com",
    "shila@example.com",
    "hari@example.com",
    "sarita@example.com",
    "krishna@example.com",
    "gita@example.com",
    "rajesh@example.com",
    "sita@example.com",
    "prakash@example.com",
    "uma@example.com",
    "dinesh@example.com",
    "muna@example.com",
    "bibek@example.com",
    "nisha@example.com",
    "deepak@example.com",
    "ashmita@example.com"
];

// Generating random appointment dates within a range
$startDate = strtotime("2023-01-01");
$endDate = strtotime("2023-12-31");

// Array of passwords
$passwords = [
    "admin",
    "password123",
    "securepass",
    "nepal2023",
    "nepal@123",
    "userpass",
    "welcome123",
    "pass1234",
    "password1234",
    "letmein",
    "abc123",
    "changeme",
    "qwerty",
    "adminpass",
    "test123",
    "p@ssw0rd",
    "12345678",
    "login123",
    "12345",
    "password1",
    "pass123"
];
$roles=['ADMIN'];

// Inserting data into the database
for ($i = 0; $i < count($names); $i++) {
    $name = $names[$i];
    $email = $emails[$i];
    $appointmentDate = date("Y-m-d", mt_rand($startDate, $endDate));
    $role=$roles[$i]??"USER";
    $password = password_hash($passwords[$i], PASSWORD_BCRYPT);

    // Sample query to insert data
    $db->query('INSERT INTO users(name,email,appointment_date,password,role) VALUES(:name,:email,:appointment_date,:password,:role)', [
        'name' => $name,
        'email' => $email,
        'appointment_date' => $appointmentDate,
        'password' => $password,
        'role' => $role
    ]);
}

echo "Data inserted successfully.";
?>
