<?php

$response = $_SESSION['modal']['response']?? NULL;
$image = $_SESSION['modal']['imagePath']?? NULL; 
$output = $_SESSION['modal']['output']?? NULL;

require view("partials/modal");
?>

<div class="employees">
    <?php
    require view("admin/employees/newRequests");
    ?>
 <?php
    require view("admin/employees/listEmployees");
    ?>
