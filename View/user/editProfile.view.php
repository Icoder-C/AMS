<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserID = $_SESSION['user']['EmployeeID'];

$statement = $db->query("SELECT * FROM users WHERE EmployeeID = $currentUserID");

$user = $statement->find();

// dd($user);
$stmt = $db->query("SELECT * FROM office");
$ofc = $stmt->find();

?>

<div class="profile">
    <div class="profile-main">
        <div class="profile-image">
            <img src="<?= $user["photo_name"] && file_exists(basePath('/public'.photo($user["photo_name"]))) ? photo($user["photo_name"]) : photo("admin.jpg") ?>" alt="profile pic" id='file-preview'>
        </div>
        <div class="profile-form">
            <div class="form-user">
                <form action="/edit-profile-validate" method="POST" enctype="multipart/form-data">
                    <div class="topic">
                        <h1>Personal Details</h1>
                    </div>

                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input type="text" name="fname" id="fname" value="<?= $_POST['fname']??($user['name'] ?? NULL) ?>">
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
                            <input type="date" name="dob" id="dob" value="<?= $_POST['dob']??($user['DOB'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['dob'])) : ?>
                                <?= $errors['dob'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="gender">Gender
                            </label>
                            <div class="radio">
                                <?php
                                $selectedGender = $_POST['gender']??($user['gender'] ?? NULL);
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
                                        "value" => "Othe"
                                    ]
                                ];
                                foreach ($genders as $gender) :
                                ?>
                                    <input type="radio" name="gender" id="<?= $gender['value'] ?>" value="<?= $gender['value'] ?>" <?= $selectedGender === $gender['value'] ? ' checked' : '' ?>>
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
                                $selected = $_POST['marital_status']??($user['maritial_status'] ?? NULL);
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

                        <div class="field"><label for="e_person">Emergency Contact Person
                            </label>
                            <input type="text" name="e_person" id="e_person" value="<?= $_POST['e_person']??($user['emergency_contact_person'] ?? NULL )?>">
                        </div>
                        <span class="error"><?php if (isset($errors['emergencyName'])) : ?>
                                <?= $errors['emergencyName'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input type="text" name="e_phone" id="e_phone" value="<?= $_POST['e_phone']??($user['emergency_contact'] ?? NULL) ?>">
                        </div>
                        <span class="error"><?php if (isset($errors['emergencyPhone'])) : ?>
                                <?= $errors['emergencyPhone'] ?>
                            <?php endif; ?></span>

                        <div class="field"><label for="image">Photo
                            </label>
                            <input type="file" name="image" id="image-upload" value="<?= $_FILES['image']??($user['file'] ?? NULL) ?>" accept="image/*">
                        </div>
                        <span class="error"><?php if (isset($errors['file'])) : ?>
                                <?= $errors['file'] ?>
                            <?php endif; ?></span>

                        <div class="buttons">
                            <button type="submit" id="save">Save</button>
                            <a href="/profile" id="cancel">Cancel</a>
                        </div>

                    </div>
                    <script>
                        // Insert the JavaScript code here
                        const input = document.getElementById('image-upload');

                        const previewPhoto = () => {
                            const file = input.files[0];
                            if (file) {
                                const fileReader = new FileReader();
                                const preview = document.getElementById('file-preview');
                                fileReader.onload = (event) => {
                                    preview.setAttribute('src', event.target.result);
                                };
                                fileReader.readAsDataURL(file);
                            }
                        };

                        input.addEventListener('change', previewPhoto);
                    </script>
                </form>
            </div>
        </div>
    </div>
<?php
    // $errors=[];
?>
</div>
