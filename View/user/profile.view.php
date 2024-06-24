<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$currentUserID = $_SESSION['user']['EmployeeID'];

$statement = $db->query("SELECT * FROM users WHERE EmployeeID = $currentUserID");

$user = $statement->find();

// dd($_SESSION);
$response = $_SESSION['modal']['response'] ?? NULL;
$image = $_SESSION['modal']['imagePath'] ?? NULL;
$output = $_SESSION['modal']['output'] ?? NULL;

require view("partials/modal");
// dd($user);

$stmt = $db->query("SELECT * FROM office");
$ofc = $stmt->find();
// dd(file_exists(basePath('/public'.photo($user["photo_name"]))) ? photo($user["photo_name"]) : photo("admin.jpg"));
// dd(file_exists(photo($user["photo_name"])));
// dd(photo($user["photo_name"]));

?>

<div class="profile">
    <div class="profile-main">
        <div class="profile-image">
            <img src="<?= $user["photo_name"] && file_exists(basePath('/public' . photo($user["photo_name"]))) ? photo($user["photo_name"]) : photo("admin.jpg") ?>" alt="profile pic">
        </div>
        <div class="profile-form">
            <div class="form-user">
                <form action="#" method="post">
                    <div class="topic">
                        <h1>Personal Details</h1>
                        <a href="/profile/edit-profile">Edit</a>
                    </div>
                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input readonly type="text" name="fname" id="fname" value="<?= $user['name'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="email">Email
                            </label>
                            <input readonly type="email" name="email" id="email" value="<?= $user['email'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input readonly type="text" name="phone" id="phone" value="<?= $user['phone_number'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="address">Address
                            </label>
                            <input readonly type="text" name="address" id="address" value="<?= $user['address'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="dob">Date of Birth
                            </label>
                            <input readonly type="text" name="dob" id="dob" value="<?= $user['DOB'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="gender">Gender
                            </label>
                            <div class="radio">
                                <?php
                                $selectedGender = $user['gender'] ?? NULL;
                                $genders = [
                                    [
                                        "label" => "Male",
                                        "value" => "Male"
                                    ],
                                    [
                                        "label" => "Female",
                                        "value" => "Female"
                                    ],
                                    [
                                        "label" => "Other",
                                        "value" => "Other"
                                    ]
                                ];
                                foreach ($genders as $gender) :
                                ?>
                                    <input type="radio" name="gender" id="<?= $gender['value'] ?>" value="<?= $gender['value'] ?>" <?= is_null($selectedGender) ? '' : 'disabled' ?> <?= $selectedGender === $gender['value'] ? ' checked' : '' ?>>
                                    <label for="<?= $gender['value'] ?>"><?= $gender['label'] ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="field"><label for="married_status">Maritial Status
                            </label>
                            <!-- <select name="married_status" id="married_status">
                                <option value="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select> -->
                            <input readonly type="text" name="married_status" id="married_status" value="<?= $user['maritial_status'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="e_person">Emergency Contact person
                            </label>
                            <input readonly type="text" name="e_person" id="e_person" value="<?= $user['emergency_contact_person'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input readonly type="text" name="e_phone" id="e_phone" value="<?= $user['emergency_contact'] ?? NULL ?>">
                        </div>

                    </div>

                </form>
            </div>
            <div class="form-official">
                <form action="#" method="post">
                    <div class="topic">
                        <h1>Official Details</h1>
                        <!-- <button type="button">Edit</button> -->
                    </div>

                    <div class="table">
                        <div class="field"><label for="department">Department
                            </label>
                            <input type="text" readonly name="department" id="department" <?= $user['department'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="position">Position
                            </label>
                            <input type="text" readonly name="position" id="position" <?= $user['position'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="checkIn">Check In Time
                            </label>
                            <input type="text" readonly name="checkIn" id="checkIn" <?= $user['checkIn'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="check-out">Check Out Time
                            </label>
                            <input type="text" readonly name="check-out" id="check-out" <?= $user['checkOut'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="rate_p_hr">Basic Rate (/hour)
                            </label>
                            <input type="number" readonly name="rate_p_hr" id="rate_p_hr" <?= $user['rate'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="supervisor">Supervisor
                            </label>
                            <input type="text" readonly name="supervisor" id="supervisor" <?= $user['supervisor'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="emp_id">Employee ID
                            </label>
                            <input type="number" readonly name="emp_id" id="emp_id" <?= $user['EmployeeID'] ?? NULL ?>>
                        </div>
                        <div class="field"><label for="doa">Date of Appointment
                            </label>
                            <input type="text" readonly name="doa" id="doa" <?= $user['appointment_date'] ?? NULL ?>>
                        </div>

                    </div>

                </form>
            </div>
            <div class="change-pw">
                <form action="/change-password" method="post">
                    <div class="topic">
                        <h1>Change Password</h1>
                        <h1 id="click" onclick="showHide()">+</h1>
                    </div>
                    <div class="table" id="changepassword">
                        <div class="field"><label for="current_password">Current Password
                            </label>
                            <input type="password" name="current_password" id="current_password">
                        </div>
                        <span class="error"><?php if (isset($errors['currentPassword'])) : ?>
                                <?= $errors['currentPassword'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="new_password">New Password
                            </label>
                            <input type="password" name="new_password" id="new_password">
                        </div>
                        <span class="error"><?php if (isset($errors['password'])) : ?>
                                <?= $errors['password'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="confirm_password">Confirm Password
                            </label>
                            <input type="password" name="confirm_password" id="confirm_password">
                        </div>
                        <span class="error"><?php if (isset($errors['confirmPassword'])) : ?>
                                <?= $errors['confirmPassword'] ?>
                            <?php endif; ?></span>
                        <button id="changePw" type="submit">Save Changes</button>
                    </div>
                </form>
                <script src="<?= js("utils") ?>">
                </script>
            </div>
        </div>
    </div>
</div>