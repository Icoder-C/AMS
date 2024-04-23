<?php 

$router->get('/', '/App/controllers/index.php');
$router->get('/sign-in', '/App/controllers/auth/sign-in.php');
$router->get('/sign-up', '/App/controllers/auth/sign-up.php');