<?php
use Core\geoLocationProvider;


geoLocationProvider::getGeoLocation();

$lat=27.671376;
$long=85.349779;


echo json_encode(compact('lat','long'));