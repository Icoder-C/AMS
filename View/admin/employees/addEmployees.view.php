<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$EmployeeID = $_GET["id"];

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

                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input readonly type="text" name="fname" id="fname" value="<?= $result["name"] ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="email">Email
                            </label>
                            <input readonly type="email" name="email" id="email" value="<?= $result["email"] ?>">
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
                            <input type="date" name="doa" id="doa">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="phone">Check In Time
                            </label>
                            <input type="time" name="phone" id="phone">
                        </div>
                        <span class="error"><?php if (isset($errors['checkInTime'])) : ?>
                                <?= $errors['checkInTime'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="check-out">Check Out Time
                            </label>
                            <input type="time" name="check-out" id="check-out">
                        </div>
                        <span class="error"><?php if (isset($errors['checkOutTime'])) : ?>
                                <?= $errors['checkOutTime'] ?>
                            <?php endif; ?></span>
                        <div class="field"><label for="rate_p_hr">Basic Rate (/hour)
                            </label>
                            <input type="number" name="rate_p_hr" id="rate_p_hr">
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
                        <button id="changePw" type="submit">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>