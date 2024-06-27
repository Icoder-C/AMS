<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$EmployeeID = $_GET["id"];

$errors=isset($_SESSION['errors-addemp'])? $_SESSION['errors-addemp'] :[];

unset($_SESSION['errors-addemp']);

$query = "SELECT * FROM users_temp WHERE EmployeeID=:EmployeeID";

$result = $db->query($query, [
    "EmployeeID" => $EmployeeID
])->find();
?>

<div class="profile">
    <div class="profile-main">
        <div class="profile-form">
            <div class="form-user">
                <form action="/add-employee-validate" method="POST">
                    <div class="topic">
                        <h1>Personal Details</h1>
                    </div>

                    <input type="hidden" name="id" value="<?=$EmployeeID?>">
                    <div class="table">
                        
                        <div class="field"><label for="fname">Name
                            </label>
                            <input readonly type="text" name="fname" id="fname" value="<?= $result["name"] ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="email">Email
                            </label>
                            <input readonly t
                            ype="email" name="email" id="email" value="<?= $result["email"] ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input readonly type="text" name="phone" id="phone" value="<?= $result["phone_number"] ?>">
                        </div>
                        <span class="error"></span>
                    </div>
                    <div class="topic">
                        <h1>Official Details</h1>
                    </div>

                    <div class="table">
                        <div class="field"><label for="department">Department
                            </label>
                            <select name="department">
                                <option value="">Select</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Finance">Finance</option>
                                <option value="IT">IT</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Sales">Sales</option>
                                <option value="Operations">Operations</option>
                                <option value="Customer Support">Customer Support</option>
                                <option value="Administration">Administration</option>
                            </select>
                        </div>
                        <span class="error"><?php if (isset($errors['department'])) : ?>
                                <?= $errors['department'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="position">Position
                            </label>
                            <select name="position">
                                <option value="">Select</option>
                                <option value="Manager">Manager</option>
                                <option value="Assistant Manager">Assistant Manager</option>
                                <option value="Senior Developer">Senior Developer</option>
                                <option value="Junior Developer">Junior Developer</option>
                                <option value="Accountant">Accountant</option>
                                <option value="HR Specialist">HR</option>
                                <option value="Marketing Coordinator">Marketing Coordinator</option>
                                <option value="Sales Representative">Sales Representative</option>
                                <option value="Customer Support Representative">Customer Support Representative</option>
                                <option value="Receptionist">Receptionist</option>
                            </select>
                        </div>
                        <span class="error"><?php if (isset($errors['position'])) : ?>
                                <?= $errors['position'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="doa">Date of Appointment
                            </label>
                            <input type="date" name="doa" id="doa">
                        </div>
                        <span class="error"><?php if (isset($errors['doa'])) : ?>
                                <?= $errors['doa'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="checkIn">Check In Time
                            </label>
                            <input type="time" name="checkIn" id="checkIn">
                        </div>
                        <span class="error"><?php if (isset($errors['checkInTime'])) : ?>
                                <?= $errors['checkInTime'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="checkOut">Check Out Time
                            </label>
                            <input type="time" name="checkOut" id="checkOut">
                        </div>
                        <span class="error"><?php if (isset($errors['checkOutTime'])) : ?>
                                <?= $errors['checkOutTime'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="rate">Basic Rate (/hour)
                            </label>
                            <input type="number" name="rate" id="rate">
                        </div>
                        <span class="error"><?php if (isset($errors['basicRate'])) : ?>
                                <?= $errors['basicRate'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="supervisor">Supervisor
                            </label>
                            <input type="text" name="supervisor" id="supervisor">
                        </div>
                        <span class="error"><?php if (isset($errors['fname'])) : ?>
                                <?= $errors['fname'] ?>
                            <?php endif; ?></span>
                        <button id="changePw" type="submit">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>