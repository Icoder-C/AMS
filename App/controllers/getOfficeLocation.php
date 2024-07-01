<?php

use Core\App;
use Core\Database;

$db=APP::resolve(Database::class);

// $location=geoLocationProvider::getGeoLocation(); 
// $lat=$location['lat'];
// $long=$location['long'];
// // $db->query("INSERT INTO office(Latitude, Longitude) VALUES (:lat, :long)",[
// //     "lat"=>$lat,
// //     "long"=>$long
// // ]);

$query="SELECT * FROM office";
$result=$db->query($query)->find();



$lat=$result['Latitude'];
$long=$result['Longitude'];


echo json_encode(compact('lat','long'));