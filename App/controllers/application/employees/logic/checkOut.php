<?php

use Core\App;
use Core\Database;
use Core\geoLocationProvider;

echo "There is some errors with this";

// Function to calculate the distance between two points using the Haversine formula
function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
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
function isWithinCheckInZone($userLat, $userLon, $officeLat, $officeLon, $radius = 10) {
    $distance = haversineGreatCircleDistance($userLat, $userLon, $officeLat, $officeLon);
    return $distance <= $radius;
}

$locationData = geoLocationProvider::getGeoLocation();

$lat = settype($locationData["lat"],"float");
$long = settype($locationData["long"],"float");

$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

$db = App::resolve(Database::class);

$empID = $_SESSION['user']['EmployeeID'];

$query = "SELECT status FROM users WHERE EmployeeID= :EmployeeID";

$statement = $db->query($query, ["EmployeeID" => $empID]);

$result = $statement->find();

if ($result = "on") {
    // Designated location's latitude and longitude
    // $designatedLat = 27.6974; // Example: Latitude of the designated location
    // $designatedLon = 85.3318; // Example: Longitude of the designated location
     
    $designatedLat = $lat; // Example: Latitude of the designated location
    $designatedLon=$long;


    // Check if the user's location is within the check-in zone
    if (isWithinCheckInZone($lat, $long, $designatedLat, $designatedLon)) {
        echo "Check-in successful!";
        dd([$currentDate, $currentTime, $lat, $long, $designatedLat, $designatedLon]);
    } else {
        echo "You are not within the check-in zone.";
    }
} else {
    echo "You cannot check in as you are already checked in";
}
?>
