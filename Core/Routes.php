<?php

$router->get('/', 'index.php')->only('guest');
$router->get('/seed', 'seed.php');

$router->get('/get-location', 'getOfficeLocation.php')->only('auth');

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
$router->post('/check-in', 'application/employees/logic/checkIn.php')->only('auth');
$router->post('/check-out', 'application/employees/logic/checkOut.php')->only('auth');
$router->get('/leave-apply', 'application/employees/applyLeave.php')->only('auth');
$router->post('/leave-apply', 'application/employees/applyLeave.php')->only('auth');
$router->post('/edit-profile-validate', 'application/employees/logic/validateEditProfile.php')->only("auth");
$router->get('/employees/view-profile', 'application/employees/viewEmployeeProfile.php')->only('admin');
$router->get('/employees/edit-employees-profile', 'application/employees/editEmpProfile.php')->only('admin');


$router->post('/leave/validate-leave', 'application/employees/logic/validateLeave.php')->only("auth");
$router->post('/add-employee-validate', 'application/employees/logic/validateAddEmployee.php')->only("auth");
$router->get('/employees/add-employee', 'application/employees/addEmployees.php')->only('admin');
$router->get('/employees/approve-leave', 'application/employees/logic/leaveApprove.php')->only('admin');
$router->get('/employees/reject-leave', 'application/employees/logic/leaveReject.php')->only('admin');
$router->get('/profile/edit-profile', 'application/employees/editProfile.php')->only('auth');
$router->post('/change-password', 'application/employees/logic/changePassword.php')->only("auth");


$router->delete('/delete-request', 'application/employees/logic/deleteRequest.php')->only("auth");
$router->delete('/session', 'auth/session-destroy.php')->only("auth");
$router->post('/searchRecord', 'application\employees\logic\searchEmployeeRecord.php')->only("auth");