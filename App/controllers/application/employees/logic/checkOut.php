<?php

use Core\App;
use Core\Database;
use Core\geoLocationProvider;

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

$locationData = geoLocationProvider::getGeoLocation();

$lat = $locationData["lat"];
$long = $locationData["long"];

settype($lat, "float");
settype($long, "float");

$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

$db = App::resolve(Database::class);

$empID = $_SESSION['user']['EmployeeID'];

$query = "SELECT status FROM users WHERE EmployeeID= :EmployeeID";

$statement = $db->query($query, ["EmployeeID" => $empID]);

$result = $statement->find();
// dd($result['status']);

if ($result['status'] == "on") {
    // Designated location's latitude and longitude
    $designatedLat = 27.6974; // Example: Latitude of the designated location
    $designatedLon = 85.3318; // Example: Longitude of the designated location

    // Check if the user's location is within the check-in zone
    if (isWithinCheckInZone($lat, $long, $designatedLat, $designatedLon)) {
        try{
            $queryCheckOut="UPDATE Attendance 
                            SET CheckOutTime= :CheckOutTime, Status='Present'
                            WHERE EmployeeID=:EmployeeID AND AttendanceDate=:AttendanceDate";
            $stmt=$db->query($queryCheckOut,[
                    "CheckOutTime"=>$currentTime,
                    "EmployeeID"=>$empID,
                    "AttendanceDate"=>$currentDate
            ]);
            $statement_main_table=$db->query("UPDATE users
                                        SET Status= 'off'
                                        WHERE EmployeeID=:EmployeeID",[
                                        "EmployeeID"=>$empID]);
            $_SESSION['modal']=[
                "response"=>'Check Out Sucessful',
                "imagePath"=>"success.svg"
            ];
        }
        catch(PDOException $e){
            if($e->getCode()==23000){
                dd($e);
                $_SESSION['modal']=[
                    "response"=>'You have already checked in and out for today.',
                    "imagePath"=>"failure.svg"
                ];
            }
            else{
                $_SESSION['modal']=[
                    "response"=>"An error occured while inserting the data: ".$e->getMessage(),
                    "imagePath"=>"failure.svg"
                ];
            }
        }
        catch(Exception $e){
            $_SESSION['modal']=[
                "response"=>"An Unexpected error occurred: ".$e->getMessage(),
                "imagePath"=>"failure.svg"
            ];
        }

    } else {
        $_SESSION['modal']=[
            "response"=>"You are not within the check-in zone.",
            "imagePath"=>"failure.svg"
        ];
    }
} else {
    $_SESSION['modal']=[
        "response"=>"You cannot check out as you have already checked out for today",
        "imagePath"=>"failure.svg"
    ];
}
// dd($_SESSION);

header("location: /");

