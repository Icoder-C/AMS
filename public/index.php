<?php
define("BASE_PATH", dirname(__DIR__));
require BASE_PATH . "/Utils/functions.php";


spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("/{$class}.php");
});

require basePath("/Core/db_connect.php");
// require basePath("/Core/Config/database.mysqli.php");

$router = new \Core\Router();

$routes = require basePath("/Core/routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


