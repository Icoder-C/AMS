<?php
use Core\Database;
use Core\Validation;
use Core\App;

$db = App::resolve(Database::class);

$currentUserID = $_SESSION['user']['EmployeeID'];

$errors = [];

// dd($_SESSION);

$currentPassword=trim($_POST['current_password']);
$newPassword=trim($_POST['new_password']);
$confirmPassword=trim($_POST['confirm_password']);

$query="SELECT password FROM users WHERE  EmployeeID=$currentUserID";

$pw=$db->query($query)->find();
// dd();

if($currentPassword && password_verify($currentPassword,$pw['password'])){
    Validation::passwordValidation($newPassword??NULL);
    Validation::confirmPasswordValidation($newPassword??NULL,$confirmPassword??NULL);

    $errors=Validation::getErrors();

    if($newPassword==$currentPassword){
        $errors['password']="*New password cannot be the same as the old password.";
    }
}
else{
    $errors['currentPassword']="*Current Password is Incorrect.";
}
if(!empty($errors)){
    return require controller(
        'application/profile',
        [
                'errors' => $errors
        ]
);
}

$newPassword= password_hash($newPassword, PASSWORD_BCRYPT);

$db->query("UPDATE users SET password=:password WHERE EmployeeID=:EmployeeID", [
    ":EmployeeID" => $currentUserID,
    ":password" => $newPassword
]);

$_SESSION['modal']=[
    "response"=>'Password Changed successfully.',
    "imagePath"=>"success.svg"
];
header("location: /profile");