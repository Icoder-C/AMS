<?php

use Core\Database;
use Core\App;

$db=App::resolve(Database::class);


$currentUserID=$_SESSION['user']['EmployeeID'];

$statement=$db->query("SELECT * FROM users WHERE EmployeeID = $currentUserID");

$user=$statement->find();

// dd($user);

$stmt=$db->query("SELECT * FROM office");
$ofc=$stmt->find();

// dd($ofc);

?>

<div class="profile">
    <div class="profile-main">
        <div class="profile-image">
            <img src="<?= photo("admin.jpg") ?>" alt="profile pic">
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
                            <input readonly type="text" name="fname" id="fname" value="<?= $user['name']??NULL?>">
                        </div>

                        <div class="field"><label for="email">Email
                            </label>
                            <input readonly type="email" name="email" id="email" value="<?= $user['email']??NULL?>">
                        </div>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input readonly type="text" name="phone" id="phone" value="<?= $user['phone_number']??NULL?>">
                        </div>

                        <div class="field"><label for="address">Address
                            </label>
                            <input readonly type="text" name="address" id="address" value="<?= $user['address']??NULL?>">
                        </div>

                        <div class="field"><label for="dob">Date of Birth
                            </label>
                            <input readonly type="text" name="dob" id="dob" value="<?= $user['DOB']??NULL?>">
                        </div>

                        <div class="field"><label for="gender">Gender
                            </label>
                            <div class="radio">
                                <?php
                                $selectedGender = $user['gender']??NULL;
                                $genders = [
                                    [
                                        "label" => "Male",
                                        "value" => "M"
                                    ],
                                    [
                                        "label" => "Female",
                                        "value" => "F"
                                    ],
                                    [
                                        "label" => "Other",
                                        "value" => "O"
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
                            <input readonly type="text" name="married_status" id="married_status" value="<?= $user['maritial_status']??NULL?>">
                        </div>

                        <div class="field"><label for="e_person">Emergency Contact person
                            </label>
                            <input readonly type="text" name="e_person" id="e_person" value="<?= $user['emergency_contact_person']??NULL?>">
                        </div>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input readonly type="text" name="e_phone" id="e_phone" value="<?= $user['emergency_contact']??NULL?>">
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
                            <input type="text" name="department" id="department" <?= $user['department']??NULL?>>
                        </div>
                        <div class="field"><label for="position">Position
                            </label>
                            <input type="text" name="position" id="position" <?= $user['position']??NULL?>>
                        </div>
                        <div class="field"><label for="checkIn">Check In Time
                            </label>
                            <input type="time" name="checkIn" id="checkIn" <?= $user['checkIn']??NULL?>>
                        </div>
                        <div class="field"><label for="check-out">Check Out Time
                            </label>
                            <input type="time" name="check-out" id="check-out" <?= $user['checkOut']??NULL?>>
                        </div>
                        <div class="field"><label for="rate_p_hr">Basic Rate (/hour)
                            </label>
                            <input type="number" name="rate_p_hr" id="rate_p_hr" <?= $user['rate']??NULL?>>
                        </div>
                        <div class="field"><label for="supervisor">Supervisor
                            </label>
                            <input type="text" name="supervisor" id="supervisor" <?= $user['supervisor']??NULL?>>
                        </div>
                        <div class="field"><label for="emp_id">Employee ID
                            </label>
                            <input type="number" name="emp_id" id="emp_id" <?= $user['EmployeeID']??NULL?>>
                        </div>
                        <div class="field"><label for="doa">Date of Appointment
                            </label>
                            <input type="date" name="doa" id="doa" <?= $user['appointment_date']??NULL?>>
                        </div>

                    </div>

                </form>
            </div>
            <div class="change-pw">
                <form action="" method="post">
                    <div class="topic">
                        <h1>Change Password</h1>
                        <h1 id="click" onclick="showHide()">+</h1>
                    </div>
                    <div class="table" id="changepassword">
                        <div class="field"><label for="current-password">Current Password
                            </label>
                            <input type="password" name="current-password" id="current-password">
                        </div>
                        <div class="field"><label for="current-password">New Password
                            </label>
                            <input type="password" name="current-password" id="current-password">
                        </div>
                        <div class="field"><label for="current-password">Confirm Password
                            </label>
                            <input type="password" name="current-password" id="current-password">
                        </div>
                        <button id="changePw" type="submit">Save Changes</button>
                    </div>
                </form>
                <script src="<?=js("utils")?>">
                </script>
            </div>
        </div>
    </div>
</div>