<?php

require basePath("/Config/Database.php");

$config =require basePath('/Config/config.php');


$db = new Database($config);
$users = $db->query("SELECT * FROM users;")->fetchAll();

// dd($users);

foreach ($users as $user) {
    echo "<li>" . $user['name'] . "</li>";
}
