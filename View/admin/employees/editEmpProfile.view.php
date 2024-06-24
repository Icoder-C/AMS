<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$currentUserID = $_GET['id'];

$statement = $db->query("SELECT * FROM users WHERE EmployeeID = $currentUserID");

$user = $statement->find();

// dd($user);

$stmt = $db->query("SELECT * FROM office");
$ofc = $stmt->find();

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

                    </div>

                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input type="text" name="fname" id="fname" value="<?= $user['name'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="email">Email
                            </label>
                            <input type="email" name="email" id="email" value="<?= $user['email'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input type="text" name="phone" id="phone" value="<?= $user['phone_number'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="address">Address
                            </label>
                            <input type="text" name="address" id="address" value="<?= $user['address'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="dob">Date of Birth
                            </label>
                            <input type="text" name="dob" id="dob" value="<?= $user['DOB'] ?? NULL ?>">
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
                            
                            <input type="text" name="married_status" id="married_status" value="<?= $user['maritial_status'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="e_person">Emergency Contact person
                            </label>
                            <input type="text" name="e_person" id="e_person" value="<?= $user['emergency_contact_person'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input type="text" name="e_phone" id="e_phone" value="<?= $user['emergency_contact'] ?? NULL ?>">
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
                            <input type="text" name="department" id="department">
                        </div>
                        <span class="error"><?php if (isset($errors['department'])) : ?>
                                <?= $errors['department'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="position">Position
                            </label>
                            <input type="text" name="position" id="position">
                        </div>
                        <span class="error"><?php if (isset($errors['position'])) : ?>
                                <?= $errors['position'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="doa">Date of Appointment
                            </label>
                            <input type="text" name="doa" id="doa">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="phone">Check In Time
                            </label>
                            <input type="text" name="phone" id="phone">
                        </div>
                        <span class="error"><?php if (isset($errors['checkInTime'])) : ?>
                                <?= $errors['checkInTime'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="check-out">Check Out Time
                            </label>
                            <input type="text" name="check-out" id="check-out">
                        </div>
                        <span class="error"><?php if (isset($errors['checkOutTime'])) : ?>
                                <?= $errors['checkOutTime'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="rate_p_hr">Basic Rate (/hour)
                            </label>
                            <input type="text" name="rate_p_hr" id="rate_p_hr">
                        </div>
                        <span class="error"><?php if (isset($errors['basicRate'])) : ?>
                                <?= $errors['basicRate'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="supervisor">Supervisor
                            </label>
                            <input type="text" name="supervisor" id="supervisor">
                        </div>
                        <span class="error"><?php if (isset($errors['Supervisor'])) : ?>
                                <?= $errors['Supervisor'] ?>
                            <?php endif; ?></span>

                        <div class="buttons">
                            <button type="submit" id="save">Save</button>
                            <a href="/profile" id="cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>