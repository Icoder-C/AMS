<?php

// use Core\App;
// use Core\Database;

// $db = App::resolve(Database::class);

// // Array of sample names
// $names = [
//     "Roshan Phuyal", "Suresh Adhikari", "Rita Shrestha", "Nabin Gautam", "Anita Sharma",
//     "Ramesh Maharjan", "Shila Karki", "Hari Bhandari", "Sarita Regmi", "Krishna Thapa",
//     "Gita Acharya", "Rajesh Nepal", "Sita Basnet", "Prakash Oli", "Uma KC",
//     "Dinesh Tamang", "Muna Rai", "Bibek Singh", "Nisha Lama", "Deepak Subedi",
//     "Ashmita Bista"
// ];

// // Array of sample emails
// $emails = [
//     "admin@gmail.com", "suresh@example.com", "rita@example.com", "nabin@example.com", "anita@example.com",
//     "ramesh@example.com", "shila@example.com", "hari@example.com", "sarita@example.com", "krishna@example.com",
//     "gita@example.com", "rajesh@example.com", "sita@example.com", "prakash@example.com", "uma@example.com",
//     "dinesh@example.com", "muna@example.com", "bibek@example.com", "nisha@example.com", "deepak@example.com",
//     "ashmita@example.com"
// ];

// // Generating random appointment dates within a range
// $startDate = strtotime("2023-01-01");
// $endDate = strtotime("2023-12-31");

// // Array of passwords
// $passwords = [
//     "admin", "password123", "securepass", "nepal2023", "nepal@123", "userpass", "welcome123", "pass1234", 
//     "password1234", "letmein", "abc123", "changeme", "qwerty", "adminpass", "test123", "p@ssw0rd", 
//     "12345678", "login123", "12345", "password1", "pass123"
// ];

// $roles = ['ADMIN'];

// // Inserting data into the Users table
// for ($i = 0; $i < count($names); $i++) {
//     $name = $names[$i];
//     $email = $emails[$i];
//     $appointmentDate = date("Y-m-d", mt_rand($startDate, $endDate));
//     $role = $roles[$i] ?? "USER";
//     $password = password_hash($passwords[$i], PASSWORD_BCRYPT);

//     // Sample query to insert data
//     $db->query('INSERT INTO users (name, email, appointment_date, password, role) VALUES (:name, :email, :appointment_date, :password, :role)', [
//         'name' => $name,
//         'email' => $email,
//         'appointment_date' => $appointmentDate,
//         'password' => $password,
//         'role' => $role
//     ]);
// }

// // Generating random attendance data
// function generateRandomAttendance($db, $employeeId) {
//     for ($j = 0; $j < 10; $j++) {
//         $attendanceDate = date("Y-m-d", strtotime("-" . rand(1, 30) . " days"));
        
//         // Check if an attendance record already exists for this employee on this date
//         $existing = $db->query('SELECT COUNT(*) as count FROM Attendance WHERE EmployeeID = :employee_id AND AttendanceDate = :attendance_date', [
//             'employee_id' => $employeeId,
//             'attendance_date' => $attendanceDate
//         ])->find()['count'];

//         // Skip this iteration if record exists
//         if ($existing > 0) {
//             continue;
//         }

//         $checkInTime = date("H:i:s", strtotime(rand(8, 10) . ":" . rand(0, 59)));
//         $checkOutTime = date("H:i:s", strtotime(rand(16, 19) . ":" . rand(0, 59)));
//         $status = rand(0, 9) < 1 ? "Absent" : "Present"; // 10% chance of being absent

//         $db->query('INSERT INTO Attendance (EmployeeID, AttendanceDate, CheckInTime, CheckOutTime, Status) VALUES (:employee_id, :attendance_date, :check_in_time, :check_out_time, :status)', [
//             'employee_id' => $employeeId,
//             'attendance_date' => $attendanceDate,
//             'check_in_time' => $checkInTime,
//             'check_out_time' => $checkOutTime,
//             'status' => $status
//         ]);
//     }
// }

// // Generating random leave data
// function generateRandomLeave($db, $employeeId) {
//     for ($k = 0; $k < 5; $k++) {
//         $leaveTypeOptions = ['Sick Leave', 'Vacation', 'Maternity Leave', 'Paternity Leave'];
//         $leaveType = $leaveTypeOptions[array_rand($leaveTypeOptions)];
//         $startDate = date("Y-m-d", strtotime("-" . rand(1, 30) . " days"));
//         $endDate = date("Y-m-d", strtotime($startDate . " + " . rand(1, 5) . " days"));
//         $statusOptions = ['Pending', 'Approved', 'Rejected'];
//         $status = $statusOptions[array_rand($statusOptions)];
//         $notes = "Sample note for leave";

//         $db->query('INSERT INTO EmployeeLeave (EmployeeID, LeaveType, StartDate, EndDate, Status, Notes) VALUES (:employee_id, :leave_type, :start_date, :end_date, :status, :notes)', [
//             'employee_id' => $employeeId,
//             'leave_type' => $leaveType,
//             'start_date' => $startDate,
//             'end_date' => $endDate,
//             'status' => $status,
//             'notes' => $notes
//         ]);
//     }
// }

// // Insert attendance and leave data for employees with IDs from 2 to 21 (excluding admin)
// for ($employeeId = 2; $employeeId <= 21; $employeeId++) {
//     generateRandomAttendance($db, $employeeId);
//     generateRandomLeave($db, $employeeId);
// }

// $names = [
//     "John Doe", "Jane Smith", "Michael Brown", "Emily Davis", "Christopher Johnson",
//     "Patricia Wilson", "Daniel Martinez", "Elizabeth Anderson", "Matthew Taylor", 
//     "Jessica Thomas", "Andrew Hernandez", "Amanda Jackson", "Joshua White", 
//     "Sarah Harris", "Ryan Martin", "Laura Thompson", "Nicholas Garcia", 
//     "Megan Clark", "Brandon Rodriguez", "Amber Lewis"
// ];

// // Array of sample emails
// $emails = [
//     "john.doe@gmail.com", "jane.smith@example.com", "michael.brown@example.com", 
//     "emily.davis@example.com", "christopher.johnson@example.com", "patricia.wilson@example.com", 
//     "daniel.martinez@example.com", "elizabeth.anderson@example.com", "matthew.taylor@example.com", 
//     "jessica.thomas@example.com", "andrew.hernandez@example.com", "amanda.jackson@example.com", 
//     "joshua.white@example.com", "sarah.harris@example.com", "ryan.martin@example.com", 
//     "laura.thompson@example.com", "nicholas.garcia@example.com", "megan.clark@example.com", 
//     "brandon.rodriguez@example.com", "amber.lewis@example.com"
// ];

// // Generating random appointment dates within a range
// $startDate = strtotime("2023-01-01");
// $endDate = strtotime("2023-12-31");

// // Array of passwords
// $passwords = [
//     "strongPass1!", "uniquePass2@", "securePass3#", "randomPass4$", "newPass5%", 
//     "safePass6^", "diffPass7&", "freshPass8*", "bestPass9(", "strongerPass10)", 
//     "coolPass11_", "greatPass12+", "superPass13=", "topPass14-", "nicePass15~", 
//     "coolerPass16|", "amazingPass17`", "topnotchPass18<", "fantasticPass19>", 
//     "unbeatablePass20?"
// ];

// // Shuffle passwords to ensure uniqueness
// shuffle($passwords);

// // Inserting data into the database
// for ($i = 0; $i < 20; $i++) {
//     $name = $names[$i];
//     $email = $emails[$i];
//     $appointmentDate = date("Y-m-d", mt_rand($startDate, $endDate));
//     $role = "USER"; // Default role
//     $password = password_hash($passwords[$i], PASSWORD_BCRYPT);
    
//     // Sample query to insert data
//     $db->query('INSERT INTO users_temp (name, email, appointment_date, password, role) VALUES (:name, :email, :appointment_date, :password, :role)', [
//         'name' => $name,
//         'email' => $email,
//         'appointment_date' => $appointmentDate,
//         'password' => $password,
//         'role' => $role
//     ]);
// }

// echo "Data seeded into database successfully.";

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Arrays of sample data
$names = [
    "Roshan Phuyal", "Suresh Adhikari", "Rita Shrestha", "Nabin Gautam", "Anita Sharma",
    "Ramesh Maharjan", "Shila Karki", "Hari Bhandari", "Sarita Regmi", "Krishna Thapa"
];

$temp_names = [
    "John Doe", "Jane Smith", "Michael Brown", "Emily Davis", "Christopher Johnson"
];

$emails = [
    "admin@gmail.com", "suresh@example.com", "rita@example.com", "nabin@example.com", "anita@example.com",
    "ramesh@example.com", "shila@example.com", "hari@example.com", "sarita@example.com", "krishna@example.com"
];

$temp_emails = [
    "john.doe@gmail.com", "jane.smith@example.com", "michael.brown@example.com", 
    "emily.davis@example.com", "christopher.johnson@example.com"
];

$passwords = [
    "admin", "password123", "securepass", "nepal2023", "nepal@123", "userpass", "welcome123", "pass1234", 
    "password1234", "letmein"
];

$temp_passwords = [
    "strongPass1!", "uniquePass2@", "securePass3#", "randomPass4$", "newPass5%"
];

$roles = ['ADMIN', 'USER', 'USER', 'USER', 'USER', 'USER', 'USER', 'USER', 'USER', 'USER'];

// Insert data into the users table
for ($i = 0; $i < count($names); $i++) {
    $name = $names[$i];
    $email = $emails[$i];
    $appointmentDate = date("Y-m-d", strtotime("-" . rand(30, 365) . " days"));
    $role = $roles[$i];
    $password = password_hash($passwords[$i], PASSWORD_BCRYPT);
    $status = "Active";
    $phone_number = "98" . rand(10000000, 99999999);
    $address = "Address " . ($i + 1);
    $DOB = date("Y-m-d", strtotime("-" . rand(20, 40) . " years"));
    $gender = rand(0, 1) ? "Male" : "Female";
    $maritial_status = rand(0, 1) ? "Married" : "Single";
    $emergency_contact_person = "Contact " . ($i + 1);
    $emergency_contact = "98" . rand(10000000, 99999999);
    $department = "Department " . ($i + 1);
    $position = "Position " . ($i + 1);
    $rate = rand(20000, 50000);
    $supervisor = "Supervisor " . ($i % 5 + 1);
    $checkIn = "09:00:00";
    $checkOut = "17:00:00";
    $photo_name = "photo_" . ($i + 1) . ".jpg";

    $db->query('INSERT INTO users (name, email, role, status, phone_number, address, DOB, gender, maritial_status, emergency_contact_person, emergency_contact, department, position, rate, supervisor, appointment_date, checkIn, checkOut, photo_name, password) VALUES (:name, :email, :role, :status, :phone_number, :address, :DOB, :gender, :maritial_status, :emergency_contact_person, :emergency_contact, :department, :position, :rate, :supervisor, :appointment_date, :checkIn, :checkOut, :photo_name, :password)', [
        'name' => $name,
        'email' => $email,
        'role' => $role,
        'status' => $status,
        'phone_number' => $phone_number,
        'address' => $address,
        'DOB' => $DOB,
        'gender' => $gender,
        'maritial_status' => $maritial_status,
        'emergency_contact_person' => $emergency_contact_person,
        'emergency_contact' => $emergency_contact,
        'department' => $department,
        'position' => $position,
        'rate' => $rate,
        'supervisor' => $supervisor,
        'appointment_date' => $appointmentDate,
        'checkIn' => $checkIn,
        'checkOut' => $checkOut,
        'photo_name' => $photo_name,
        'password' => $password
    ]);
}

// Insert data into the users_temp table
for ($i = 0; $i < count($temp_names); $i++) {
    $name = $temp_names[$i];
    $email = $temp_emails[$i];
    $appointmentDate = date("Y-m-d", strtotime("-" . rand(30, 365) . " days"));
    $password = password_hash($temp_passwords[$i], PASSWORD_BCRYPT);
    $role = "USER";
    $phone_number = "98" . rand(10000000, 99999999);

    $db->query('INSERT INTO users_temp (name, email, appointment_date, password, role, phone_number) VALUES (:name, :email, :appointment_date, :password, :role, :phone_number)', [
        'name' => $name,
        'email' => $email,
        'appointment_date' => $appointmentDate,
        'password' => $password,
        'role' => $role,
        'phone_number' => $phone_number
    ]);
}

// Generating random attendance data spanning at least one month
function generateRandomAttendance($db, $employeeId) {
    for ($j = 0; $j < 30; $j++) {  // Ensure at least one month of attendance data
        $attendanceDate = date("Y-m-d", strtotime("-" . rand(1, 30) . " days"));
        
        // Check if an attendance record already exists for this employee on this date
        $existing = $db->query('SELECT COUNT(*) as count FROM Attendance WHERE EmployeeID = :employee_id AND AttendanceDate = :attendance_date', [
            'employee_id' => $employeeId,
            'attendance_date' => $attendanceDate
        ])->find()['count'];

        // Skip this iteration if record exists
        if ($existing > 0) {
            continue;
        }

        $checkInTime = date("H:i:s", strtotime(rand(8, 10) . ":" . rand(0, 59)));
        $checkOutTime = date("H:i:s", strtotime(rand(16, 19) . ":" . rand(0, 59)));
        $status = rand(0, 9) < 1 ? "Absent" : "Present"; // 10% chance of being absent

        $db->query('INSERT INTO Attendance (EmployeeID, AttendanceDate, CheckInTime, CheckOutTime, Status) VALUES (:employee_id, :attendance_date, :check_in_time, :check_out_time, :status)', [
            'employee_id' => $employeeId,
            'attendance_date' => $attendanceDate,
            'check_in_time' => $checkInTime,
            'check_out_time' => $checkOutTime,
            'status' => $status
        ]);
    }
}

// Generating random leave data with future dates and only 10 pending leave records
function generateRandomLeave($db, $employeeId) {
    static $pendingLeavesCount = 0;

    for ($k = 0; $k < 5; $k++) {
        $leaveTypeOptions = ['Sick Leave', 'Vacation', 'Maternity Leave', 'Paternity Leave'];
        $leaveType = $leaveTypeOptions[array_rand($leaveTypeOptions)];
        $startDate = date("Y-m-d", strtotime("+" . rand(1, 30) . " days"));  // Future dates
        $endDate = date("Y-m-d", strtotime($startDate . " + " . rand(1, 5) . " days"));
        $statusOptions = ['Approved', 'Rejected'];
        $status = ($pendingLeavesCount < 10 && rand(0, 1)) ? "Pending" : $statusOptions[array_rand($statusOptions)];
        
        if ($status === "Pending") {
            $pendingLeavesCount++;
        }
        
        $notes = "Sample note for leave";

        $db->query('INSERT INTO EmployeeLeave (EmployeeID, LeaveType, StartDate, EndDate, Status, Notes) VALUES (:employee_id, :leave_type, :start_date, :end_date, :status, :notes)', [
            'employee_id' => $employeeId,
            'leave_type' => $leaveType,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $status,
            'notes' => $notes
        ]);
    }
}

// Insert attendance and leave data for employees with IDs from 2 to 11 (excluding admin)
for ($employeeId = 2; $employeeId <= 11; $employeeId++) {
    echo "Generating data for EmployeeID: $employeeId\n"; // Debugging line
    generateRandomAttendance($db, $employeeId);
    generateRandomLeave($db, $employeeId);
}

echo "Data seeded into database successfully.";
?>
