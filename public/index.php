<?php
session_start();
define("BASE_PATH", dirname(__DIR__));
require BASE_PATH . "/Utils/functions.php";


spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // dd($class);
    require basePath("/{$class}.php");
});

// dd(geoLocationProvider::getGeoLocation());

require basePath("/Core/db_connect.php");



// echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));

$startDate = new DateTime('2023-06-01');
$endDate = new DateTime('2023-07-10');
$interval = new DateInterval('P1D'); // 1 Day interval

$datePeriod = new DatePeriod($startDate, $interval, $endDate->add($interval));

// foreach ($datePeriod as $date) {
//     echo $date->format('Y-m-d') . "<br>";
// }
// die();

$router = new \Core\Router();

$routes = require basePath("/Core/routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// dd($uri);
$router->route($uri, $method);
