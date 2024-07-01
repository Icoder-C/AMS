<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$currentUserID = $_GET['id'];

$statement = $db->query("SELECT * FROM users WHERE EmployeeID = $currentUserID");

$user = $statement->find();

// dd($user);
$response = $_SESSION['modal']['response'] ?? NULL;
$image = $_SESSION['modal']['imagePath'] ?? NULL;
$output = $_SESSION['modal']['output'] ?? NULL;

require view("partials/modal");

$errors = isset($_SESSION['errors-edit-emp']) ? $_SESSION['errors-edit-emp'] : [];

unset($_SESSION['errors-edit-emp']);

?>

<div class="profile">
    <div class="profile-main">
        <div class="profile-image">
            <img src="<?= $user["photo_name"] && file_exists(basePath('/public' . photo($user["photo_name"]))) ? photo($user["photo_name"]) : photo("admin.jpg") ?>" alt="profile pic">
        </div>
        <div class="profile-form">
            <div class="form-user">
                <form action="/employees/edit-emp-details" method="post">
                    <div class="topic">
                        <h1>Personal Details</h1>
                    </div>
                    <div class="table">
                        <input type="hidden" name="id" value="<?= $currentUserID ?>">

                        <div class="field"><label for="fname">Name
                            </label>
                            <input type="text" name="fname" id="fname" value="<?= $_POST['fname']??($user['name'] ?? NULL)?>">
                        </div>
                        <span class="error"><?php if (isset($errors['fname'])) : ?>
                                <?= $errors['fname'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="email">Email
                            </label>
                            <input type="email" name="email" id="email" value="<?= $_POST['email']??($user['email'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['email'])) : ?>
                                <?= $errors['email'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input type="text" name="phone" id="phone" value="<?= $_POST['phone']??($user['phone_number'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['phone'])) : ?>
                                <?= $errors['phone'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="address">Address
                            </label>
                            <input type="text" name="address" id="address" value="<?= $_POST['address']??($user['address'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['address'])) : ?>
                                <?= $errors['address'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="dob">Date of Birth
                            </label>
                            <input type="text" name="dob" id="dob" value="<?= $_POST['dob']??($user['DOB'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['dob'])) : ?>
                                <?= $errors['dob'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="gender">Gender
                            </label>
                            <div class="radio">
                                <?php
                                $selectedGender = $_POST['dob']??( $user['gender'] ?? NULL);
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
                                    <input type="radio" name="gender" id="<?= $gender['value'] ?>" value="<?= $gender['value'] ?>" <?= is_null($selectedGender) ? '' : '' ?> <?= $selectedGender === $gender['value'] ? ' checked' : '' ?>>
                                    <label for="<?= $gender['value'] ?>"><?= $gender['label'] ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <span class="error"><?php if (isset($errors['gender'])) : ?>
                                <?= $errors['gender'] ?>
                            <?php endif; ?></span>

                        <div class="field">
                            <label for="marital_status">Marital Status</label>
                            <select name="marital_status" id="marital_status">
                                <?php
                                $selected = $_POST['marital_status'] ?? ($user['maritial_status'] ?? NULL);
                                $mar_status = [
                                    [
                                        "label" => "Select",
                                        "value" => ""
                                    ],
                                    [
                                        "label" => "Single",
                                        "value" => "Single"
                                    ],
                                    [
                                        "label" => "Married",
                                        "value" => "Married"
                                    ],
                                    [
                                        "label" => "Divorced",
                                        "value" => "Divorced"
                                    ]
                                ];
                                foreach ($mar_status as $mar_statu) :
                                ?>
                                    <option value="<?= $mar_statu["value"] ?>" <?= $mar_statu["value"] == $selected ? 'selected' : '' ?>><?= $mar_statu['label'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="error"><?php if (isset($errors['martialStatus'])) : ?>
                                <?= $errors['martialStatus'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="e_person">Emergency Contact person
                            </label>
                            <input type="text" name="e_person" id="e_person" value="<?= $_POST['fname']??($user['emergency_contact_person'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['emergencyName'])) : ?>
                                <?= $errors['emergencyName'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input type="text" name="e_phone" id="e_phone" value="<?= $_POST['fname']??($user['emergency_contact'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['emergencyPhone'])) : ?>
                                <?= $errors['emergencyPhone'] ?>
                            <?php endif; ?></span>
                    </div>
            </div>
            <div class="topic">
                <h1>Official Details</h1>
                <!-- <button type="button">Edit</button> -->
            </div>
            <div class="table">
                <div class="field"><label for="department">Department
                    </label>
                    <select name="department" id="department">
                        <?php
                        $selected = $_POST['department'] ?? ($user['department'] ?? NULL);
                        $departments = [
                            [
                                "label" => "Select",
                                "value" => ""
                            ], [
                                "label" => "Human Resources",
                                "value" => "Human Resources"
                            ], [
                                "label" => "Finance",
                                "value" => "Finance"
                            ], [
                                "label" => "IT",
                                "value" => "IT"
                            ], [
                                "label" => "Marketing",
                                "value" => "Marketing"
                            ], [
                                "label" => "Sales",
                                "value" => "Sales"
                            ], [
                                "label" => "Operations",
                                "value" => "Operations"
                            ], [
                                "label" => "Customer Support",
                                "value" => "Customer Support"
                            ], [
                                "label" => "Administration",
                                "value" => "Administration"
                            ],
                        ];
                        foreach ($departments as $department) :
                        ?>
                            <option value="<?= $department["value"] ?>" <?= $department["value"] == $selected ? 'selected' : '' ?>><?= $department['label'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <span class="error"><?php if (isset($errors['department'])) : ?>
                        <?= $errors['department'] ?>
                    <?php endif; ?></span>

                <div class="field"><label for="position">Position
                    </label>
                    <select name="position" id="position">
                        <?php
                        $selected = $_POST['position'] ?? ($user['position'] ?? NULL);
                        $positions = [
                            [
                                "label" => "Select",
                                "value" => ""
                            ], [
                                "label" => "Manager",
                                "value" => "Manager"
                            ], [
                                "label" => "Assistant Manager",
                                "value" => "Assistant Manager"
                            ], [
                                "label" => "Senior Developer",
                                "value" => "Senior Developer"
                            ], [
                                "label" => "Junior Developer",
                                "value" => "Junior Developer"
                            ], [
                                "label" => "Accountant",
                                "value" => "Accountant"
                            ], [
                                "label" => "HR Specialist",
                                "value" => "HR Specialist"
                            ], [
                                "label" => "Marketing Coordinator",
                                "value" => "Marketing Coordinator"
                            ], [
                                "label" => "Sales Representative",
                                "value" => "Sales Representative"
                            ], [
                                "label" => "Customer Support Representative",
                                "value" => "Customer Support Representative"
                            ], [
                                "label" => "Receptionist",
                                "value" => "Receptionist"
                            ],
                        ];
                        foreach ($positions as $position) :
                        ?>
                            <option value="<?= $position["value"] ?>" <?= $position["value"] == $selected ? 'selected' : '' ?>><?= $position['label'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <span class="error"><?php if (isset($errors['position'])) : ?>
                        <?= $errors['position'] ?>
                    <?php endif; ?></span>
                <div class="field"><label for="doa">Date of Appointment
                    </label>
                    <input type="date" name="doa" id="doa" value="<?= $_POST['doa']??($user['doa'] ?? NULL) ?>">
                </div>
                <span class="error"><?php if (isset($errors['doa'])) : ?>
                        <?= $errors['doa'] ?>
                    <?php endif; ?></span>
                <div class="field"><label for="checkIn">Check In Time
                    </label>
                    <input type="time" name="checkIn" id="checkIn" value="<?= $_POST['checkIn']??($user['checkIn'] ?? NULL) ?>">
                </div>
                <span class="error"><?php if (isset($errors['checkInTime'])) : ?>
                        <?= $errors['checkInTime'] ?>
                    <?php endif; ?></span>
                <div class="field"><label for="checkOut">Check Out Time
                    </label>
                    <input type="time" name="checkOut" id="checkOut" value="<?= $_POST['checkOut']??($user['checkOut'] ?? NULL) ?>">
                </div>
                <span class="error"><?php if (isset($errors['checkOutTime'])) : ?>
                        <?= $errors['checkOutTime'] ?>
                    <?php endif; ?></span>
                <div class="field"><label for="rate">Basic Rate (/hour)
                    </label>
                    <input type="number" name="rate" id="rate" value="<?= $_POST['rate']??($user['rate'] ?? NULL) ?>">
                </div>
                <span class="error"><?php if (isset($errors['basicRate'])) : ?>
                        <?= $errors['basicRate'] ?>
                    <?php endif; ?></span>
                <div class="field"><label for="supervisor">Supervisor
                    </label>
                    <input type="text" name="supervisor" id="supervisor" value="<?= $_POST['supervisor']??($user['supervisor'] ?? NULL) ?>">
                </div>
                <span class="error"><?php if (isset($errors['supervisor'])) : ?>
                        <?= $errors['supervisor'] ?>
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