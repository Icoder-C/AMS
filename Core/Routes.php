<?php

$router->get('/', 'index.php')->only('guest');
$router->get('/sign-in', 'auth/sign-in.php')->only('guest');
$router->get('/sign-up', 'auth/sign-up.php')->only('guest');

$router->post('/sign-in', 'auth/session-create.php')->only("guest");
$router->post('/sign-up', 'auth/store.php')->only("guest");

$router->get('/dashboard', 'application/dashboard.php')->only('auth');
$router->get('/profile', 'application/profile.php')->only('auth');
$router->get('/attendance', 'application/attendance.php')->only('auth');
$router->get('/leave', 'application/leave.php')->only('auth');
$router->get('/report', 'application/report.php')->only('auth');
$router->get('/employees', 'application/employees.php')->only('auth');

$router->delete('/session', 'auth/session-destroy.php')->only("auth");