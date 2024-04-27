<?php

use Core\App;


$db = App::resolve('Core\Database');


// $id =$_GET["id"];

$query = "SELECT * FROM users";

$users = $db ->query($query)->fetchAll();

// foreach ($users as $user) {
//     echo "<li>" . $user['name'] . "</li>";
// } 
