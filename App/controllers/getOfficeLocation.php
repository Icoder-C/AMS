<?php
use Core\geoLocationProvider;
use Core\App;
use Core\Database;

$db=APP::resolve(Database::class);

$location=geoLocationProvider::getGeoLocation(); 
$lat=$location['lat'];
$long=$location['long'];
$db->query("INSERT INTO office(Latitude, Longitude) VALUES (:lat, :long)",[
    "lat"=>$lat,
    "long"=>$long
]);

$query="SELECT * FROM office";
$stmt=$db->query($query);
$result=$stmt->findAll();


dd($result);
// $lat=27.671376;
// $long=85.349779;


echo json_encode(compact('lat','long'));