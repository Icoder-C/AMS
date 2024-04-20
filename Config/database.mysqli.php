<?php

require basePath("/Config/Database.php");

$config =require basePath('/Config/config.php');


$db = new Database($config['mysql']);

$id =$_GET["id"];

$query = "SELECT * FROM users WHERE user_id= ?;";

$users = $db->query($query,[$id])->fetch();

dd($users);

foreach ($users as $user) {
    echo "<li>" . $user['name'] . "</li>";
}
