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

$names = [
    "John Doe",
    "Jane Smith",
    "Michael Brown",
    "Emily Davis",
    "Christopher Johnson",
    "Patricia Wilson",
    "Daniel Martinez",
    "Elizabeth Anderson",
    "Matthew Taylor",
    "Jessica Thomas",
    "Andrew Hernandez",
    "Amanda Jackson",
    "Joshua White",
    "Sarah Harris",
    "Ryan Martin",
    "Laura Thompson",
    "Nicholas Garcia",
    "Megan Clark",
    "Brandon Rodriguez",
    "Amber Lewis"
];

// Array of sample emails
$emails = [
    "john.doe@gmail.com",
    "jane.smith@example.com",
    "michael.brown@example.com",
    "emily.davis@example.com",
    "christopher.johnson@example.com",
    "patricia.wilson@example.com",
    "daniel.martinez@example.com",
    "elizabeth.anderson@example.com",
    "matthew.taylor@example.com",
    "jessica.thomas@example.com",
    "andrew.hernandez@example.com",
    "amanda.jackson@example.com",
    "joshua.white@example.com",
    "sarah.harris@example.com",
    "ryan.martin@example.com",
    "laura.thompson@example.com",
    "nicholas.garcia@example.com",
    "megan.clark@example.com",
    "brandon.rodriguez@example.com",
    "amber.lewis@example.com"
];

// Generating random appointment dates within a range
$startDate = strtotime("2023-01-01");
$endDate = strtotime("2023-12-31");

// Array of passwords
$passwords = [
    "strongPass1!",
    "uniquePass2@",
    "securePass3#",
    "randomPass4$",
    "newPass5%",
    "safePass6^",
    "diffPass7&",
    "freshPass8*",
    "bestPass9(",
    "strongerPass10)",
    "coolPass11_",
    "greatPass12+",
    "superPass13=",
    "topPass14-",
    "nicePass15~",
    "coolerPass16|",
    "amazingPass17`",
    "topnotchPass18<",
    "fantasticPass19>",
    "unbeatablePass20?"
];

// Shuffle passwords to ensure uniqueness
shuffle($passwords);

// Inserting data into the database
for ($i = 0; $i < 20; $i++) {
    $name = $names[$i];
    $email = $emails[$i];
    $appointmentDate = date("Y-m-d", mt_rand($startDate, $endDate));
    $role = "USER"; // Default role
    $password = password_hash($passwords[$i], PASSWORD_BCRYPT);

    // Sample query to insert data
    $db->query('INSERT INTO users_temp(name,email,appointment_date,password,role) VALUES(:name,:email,:appointment_date,:password,:role)', [
        'name' => $name,
        'email' => $email,
        'appointment_date' => $appointmentDate,
        'password' => $password,
        'role' => $role
    ]);
}


echo "Data seeded into database successfully.";
?>
