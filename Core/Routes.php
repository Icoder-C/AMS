<?php 

$router->get('/', '/App/controllers/index.php');
$router->get('/sign-in', '/App/controllers/auth/sign-in.php');
$router->get('/sign-up', '/App/controllers/auth/sign-up.php');

$router->get('/dashboard-admin','/App/controllers/application/dashboard.php');

$router->post('/sign-in', '/App/controllers/auth/sign-in.php');
$router->post('/sign-up', '/App/controllers/auth/sign-up.php');