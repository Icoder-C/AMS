<?php

use Core\App;
use Core\Database;


if (isset($_POST['latitude']) && isset($_POST['longitude'])) {

    // Function to calculate the distance between two points using the Haversine formula
    function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    // Function to check if the user is within the check-in radius
    function isWithinCheckInZone($userLat, $userLon, $officeLat, $officeLon, $radius = 20)
    {
        $distance = haversineGreatCircleDistance($userLat, $userLon, $officeLat, $officeLon);
        return $distance <= $radius;
    }


    $db = App::resolve(Database::class);

    $query = "SELECT * FROM office";
    $result = $db->query($query)->find();

    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];


    $designatedLat = $result['Latitude'];
    $designatedLon = $result['Longitude'];

    settype($lat, "float");
    settype($long, "float");

    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');


    $empID = $_SESSION['user']['EmployeeID'];

    $query = "SELECT status FROM users WHERE EmployeeID= :EmployeeID";

    $statement = $db->query($query, ["EmployeeID" => $empID]);

    $currentDate = date('Y-m-d');

    $result = $statement->find();
    // dd($result["status"]);
    $queryAttendance = "SELECT * FROM Attendance WHERE EmployeeID=:EmployeeID AND AttendanceDate=:date";

    $todaysAttendance = $db->query($queryAttendance, [
        "EmployeeID" => $empID,
        "date" => $currentDate
    ])->find();

    if (!$todaysAttendance) {
        // Designated location's latitude and longitude

        // $designatedLat = 27.6744939; // Example: Latitude of the designated location
        // $designatedLon = 85.3446221; // Example: Longitude of the designated location

        // Check if the user's location is within the check-in zone
        if (isWithinCheckInZone($lat, $long, $designatedLat, $designatedLon)) {
            try {
                $queryCheckIn = "INSERT INTO Attendance(EmployeeID, AttendanceDate, CheckInTime, latitude, longitude, Status) 
                             VALUES (:EmployeeID, :AttendanceDate, NOW(), :latitude, :longitude, :Status)";
                $stmt = $db->query($queryCheckIn, [
                    "EmployeeID" => $empID,
                    "AttendanceDate" => $currentDate,
                    // "CheckInTime"=>$currentTime,
                    "latitude" => $lat,
                    "longitude" => $long,
                    "Status" => "Checked in only"
                ]);
                $statement_main_table = $db->query("UPDATE users
                                        SET Status= 'on'
                                        WHERE EmployeeID=:EmployeeID", [
                    "EmployeeID" => $empID
                ]);
                $_SESSION['modal'] = [
                    "response" => 'Check In Sucessful',
                    "imagePath" => "success.svg"
                ];
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $_SESSION['modal'] = [
                        "response" => 'You have already checked in and out for today.',
                        "imagePath" => "failure.svg"
                    ];
                } else {
                    $_SESSION['modal'] = [
                        "response" => "An error occured while inserting the data: " . $e->getMessage(),
                        "imagePath" => "failure.svg"
                    ];
                }
            } catch (Exception $e) {
                $_SESSION['modal'] = [
                    "response" => "An Unexpected error occurred: " . $e->getMessage(),
                    "imagePath" => "failure.svg"
                ];
            }
        } else {
            $_SESSION['modal'] = [
                "response" => "You are not within the check-in zone.",
                "imagePath" => "failure.svg"
            ];
        }
    } else {
        $_SESSION['modal'] = [
            "response" => "You cannot check in as you are already checked in",
            "imagePath" => "failure.svg"
        ];
    }
}
header("location: /");
