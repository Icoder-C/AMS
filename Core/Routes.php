<?php

$router->get('/', '/App/controllers/index.php')->only('guest');
$router->get('/sign-in', '/App/controllers/auth/sign-in.php')->only('guest');
$router->get('/sign-up', '/App/controllers/auth/sign-up.php')->only('guest');



$router->post('/sign-in', '/App/controllers/auth/session-create.php')->only("guest");
$router->post('/sign-up', '/App/controllers/auth/store.php')->only("guest");


$router->get('/dashboard', '/App/controllers/application/dashboard.php')->only('auth');


$router->delete('/session', '/App/controllers/auth/session-destroy.php')->only("auth");
