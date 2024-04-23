<?php

use Core\Database;

$id =$_GET["id"];

$query = "SELECT * FROM users WHERE user_id= ?;";

$users = $db->query($query,[$id])->fetch();

dd($users);

foreach ($users as $user) {
    echo "<li>" . $user['name'] . "</li>";
}
