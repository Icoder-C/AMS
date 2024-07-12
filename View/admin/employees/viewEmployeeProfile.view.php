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
        <img src="<?= $user["photo_name"] && file_exists(basePath('/public' . photo($user["photo_name"]))) ? photo($user["photo_name"]) : photo("admin.jpg") ?>" alt="profile pic">
        </div>
        <div class="profile-form">
            <div class="form-user">
                    <div class="topic">
                        <h1>Personal Details</h1>
                        <div class="btns">
                            <a href="/employees/edit-employees-profile?id=<?= $currentUserID?>">Edit</a>
                            <form action="/delete-request" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $currentUserID ?>">
                                <input type="hidden" name="requestFor" value="DeleteEmployee">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
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

            </div>
            <div class="form-official">
                    <div class="topic">
                        <h1>Official Details</h1>
                        <!-- <button type="button">Edit</button> -->
                    </div>

                    <div class="table">
                        <div class="field"><label for="department">Department
                            </label>
                            <input readonly type="text" name="department" id="department" value="<?= $user['department'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="position">Position
                            </label>
                            <input readonly type="text" name="position" id="position" value="<?= $user['position'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="doa">Date of Appointment
                            </label>
                            <input readonly type="text" name="doa" id="doa" value="<?= $user['appointment_date'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="chekIn">Check In Time
                            </label>
                            <input readonly type="text" name="chekIn" id="chekIn" value="<?= convertTimeFormat($user['checkIn']) ?? NULL ?>">
                        </div>

                        <div class="field"><label for="check-out">Check Out Time
                            </label>
                            <input readonly type="text" name="check-out" id="check-out" value="<?= convertTimeFormat($user['checkOut']) ?? NULL ?>">
                        </div>

                        <div class="field"><label for="rate_p_hr">Basic Rate (/hour)
                            </label>
                            <input readonly type="text" name="rate_p_hr" id="rate_p_hr" value="<?= $user['rate'] ?? NULL ?>">
                        </div>

                        <div class="field"><label for="supervisor">Supervisor
                            </label>
                            <input readonly type="text" name="supervisor" id="supervisor" value="<?= $user['supervisor'] ?? NULL ?>">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>