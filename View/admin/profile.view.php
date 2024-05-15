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
                        <button type="button">Edit</button>
                    </div>

                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input type="text" name="fname" id="fname">
                        </div>

                        <div class="field"><label for="email">Email
                            </label>
                            <input type="email" name="email" id="email">
                        </div>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input type="text" name="phone" id="phone">
                        </div>

                        <div class="field"><label for="address">Address
                            </label>
                            <input type="text" name="address" id="address">
                        </div>

                        <div class="field"><label for="dob">Date of Birth
                            </label>
                            <input type="text" name="dob" id="dob">
                        </div>

                        <div class="field"><label for="gender">Gender
                            </label>
                            <input type="text" name="gender" id="gender">
                        </div>

                        <div class="field"><label for="married_status">Maritial Status
                            </label>
                            <input type="text" name="married_status" id="married_status">
                        </div>

                        <div class="field"><label for="e_person">Emergency Contact person
                            </label>
                            <input type="text" name="e_person" id="e_person">
                        </div>

                        <div class="field"><label for="e_phone">Emergency Contact
                            </label>
                            <input type="text" name="e_phone" id="e_phone">
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
                        <div class="field"><label for="ofcName">Office Name
                            </label>
                            <input type="text" name="ofcName" id="ofcName">
                        </div>
                        <div class="field"><label for="doestablish">Date of Establishment
                            </label>
                            <input type="date" name="doestablish" id="doestablish">
                        </div>
                        <div class="field"><label for="latitude">Latitude
                            </label>
                            <input type="number" name="latitude" id="latitude">
                        </div>
                        <div class="field"><label for="longitude">Longitude
                            </label>
                            <input type="number" name="longitude" id="longitude">
                        </div>
                    </div>
                </form>
            </div>
            <div class="change-pw">
                <form action="#" method="post">
                    <div class="topic">
                        <h1>Change Password</h1>
                        <h1>+</h1>
                        <!-- <button type="button">Edit</button> -->
                    </div>
                    <div class="table">
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
                        <button type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>