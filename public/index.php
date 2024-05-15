<?php

use Core\geoLocationProvider;

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



$router = new \Core\Router();

$routes = require basePath("/Core/routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// dd($uri);
$router->route($uri, $method);
