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
            <img src="<?= file_exists(photo($user["path_photo"])) ? photo($user["path_photo"]) : photo("admin.jpg") ?>" alt="profile pic" id='file-preview'>
        </div>
        <div class="profile-form">
            <div class="form-user">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="topic">
                        <h1>Personal Details</h1>
                    </div>

                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input readonly type="text" name="fname" id="fname" value="<?= $user['name'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="email">Email
                            </label>
                            <input type="email" name="email" id="email" value="<?= $user['email'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input type="text" name="phone" id="phone" value="<?= $user['phone_number'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="address">Address
                            </label>
                            <input type="text" name="address" id="address" value="<?= $user['address'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="dob">Date of Birth
                            </label>
                            <input type="text" name="dob" id="dob" value="<?= $user['DOB'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="gender">Gender
                            </label>
                            <div class="radio">
                                <?php
                                $selectedGender = $user['gender'] ?? NULL;
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
                        <span class="error"></span>
                        <div class="field"><label for="married_status">Maritial Status
                            </label>
                            <select name="married_status" id="married_status">
                                <<?php
                                    $selected = $user['maritial_status'] ?? NULL;
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
                                    ?> <option value="<?= is_null($selected) ? '' : $mar_statu["value"] ?>" <?= $mar_statu["value"] == $selected ?? 'selected' ?>><?= $mar_statu['label'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="e_person">Emergency Contact person
                            </label>
                            <input type="text" name="e_person" id="e_person" value="<?= $user['emergency_contact_person'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input type="text" name="e_phone" id="e_phone" value="<?= $user['emergency_contact'] ?? NULL ?>">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="image">Photo
                            </label>
                            <input type="file" name="image" id="image-upload" value="<?= $user['file'] ?? NULL ?>" accept="image/*">
                        </div>
                        <span class="error"></span>

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
</div>
>