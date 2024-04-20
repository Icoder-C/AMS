<?php
define("BASE_PATH",dirname(__DIR__)); 
require BASE_PATH."/Utils/functions.php";

// require basePath("/Config/database.mysqli.php");

require basePath("/Core/router.php");

// $url = parse_url($_SERVER["REQUEST_URI"])["path"];


// require view("admin/dashboard");