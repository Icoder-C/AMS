<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$currentUserID = $_SESSION['user']['EmployeeID'];

$statement = $db->query("SELECT * FROM users WHERE EmployeeID = $currentUserID");

$user = $statement->find();

?>

<div class="accounts-icon">
    <img style="z-index: 1;" src="<?= $user["photo_name"] && file_exists(basePath('/public' . photo($user["photo_name"]))) ? photo($user["photo_name"]) : res('icons/user-blue.svg') ?>" alt="profile pic">
</div>

<?php
    $user=NULL;
?>