<?php

$router->get('/', 'index.php')->only('guest');
$router->get('/seed', 'seed.php');

$router->get('/get-location', 'getOfficeLocation.php')->only('auth');

$router->get('/sign-in', 'auth/sign-in.php')->only('guest');
$router->get('/sign-up', 'auth/sign-upatteeeee.php')->only('guest');

$router->post('/sign-in', 'auth/session-create.php')->only("guest");
$router->post('/sign-up', 'auth/store.php')->only("guest");

$router->get('/dashboard', 'application/dashboard.php')->only('auth');
$router->get('/profile', 'application/profile.php')->only('auth');
$router->get('/attendance', 'application/attendance.php')->only('auth');
$router->get('/leave', 'application/leave.php')->only('auth');
$router->get('/report', 'application/report.php')->only('auth');
$router->get('/employees', 'application/employees.php')->only('auth');
$router->post('/check-in', 'application/employees/logic/checkIn.php')->only('auth');
$router->post('/check-out', 'application/employees/logic/checkOut.php')->only('auth');
$router->get('/leave-apply', 'application/employees/applyLeave.php')->only('auth');
$router->post('/leave-apply', 'application/employees/applyLeave.php')->only('auth');

$router->get('/employees/add-employee', 'application/employees/addEmployees.php')->only('admin');
$router->get('/employees/approve-leave', 'application/employees/approveLeave.php')->only('admin');


$router->delete('/session', 'auth/session-destroy.php')->only("auth");
$router->post('/searchRecord', 'application\employees\logic\searchEmployeeRecord.php')->only("auth");