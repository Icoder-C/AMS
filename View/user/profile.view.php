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

                    <label for="fname">Name
                        <input type="text" name="fname" id="fname">
                    </label>

                    <label for="email">Email
                        <input type="email" name="email" id="email">
                    </label>

                    <label for="phone">Phone Number
                        <input type="text" name="phone" id="phone">
                    </label>

                    <label for="address">Address
                        <input type="text" name="address" id="address">
                    </label>

                    <label for="dob">Date of Birth
                        <input type="text" name="dob" id="dob">
                    </label>

                    <label for="gender">Gender
                        <input type="text" name="gender" id="gender">
                    </label>

                    <label for="married_status">Maritial Status
                        <input type="text" name="married_status" id="married_status">
                    </label>

                    <label for="e_person">Emergency Contact person
                        <input type="text" name="e_person" id="e_person">
                    </label>

                    <label for="e_phone">Emergency Contact
                        <input type="text" name="e_phone" id="e_phone">
                    </label>

                </form>
            </div>
            <div class="form-official">
            <form action="#" method="post">
                    <div class="topic">
                        <h1>Official Details</h1>
                        <!-- <button type="button">Edit</button> -->
                    </div>

                    <label for="department">Department
                        <input type="text" name="department" id="department">
                    </label>

                    <label for="position">Position
                        <input type="text" name="position" id="position">
                    </label>

                    <label for="phone">Check In Time
                        <input type="time" name="phone" id="phone">
                    </label>

                    <label for="check-out">Check Out Time
                        <input type="time" name="check-out" id="check-out">
                    </label>

                    <label for="rate_p_hr">Basic Rate (/hour)
                        <input type="number" name="rate_p_hr" id="rate_p_hr">
                    </label>

                    <label for="supervisor">Supervisor
                        <input type="text" name="supervisor" id="supervisor">
                    </label>

                    <label for="emp_id">Employee ID
                        <input type="number" name="emp_id" id="emp_id">
                    </label>

                    <label for="doa">Date of Appointment
                        <input type="date" name="doa" id="doa">
                    </label>

                </form>
            </div>
            <div class="change-pw">
                <form action="#" method="post">
                <div class="topic">
                        <h1>Official Details</h1>
                        <h1>+</h1>
                        <!-- <button type="button">Edit</button> -->
                    </div>
                    <label for="current-password">Current Password
                        <input type="password" name="current-password" id="current-password">
                    </label>

                    <label for="current-password">New Password
                        <input type="password" name="current-password" id="current-password">
                    </label>

                    <label for="current-password">Confirm Password
                        <input type="password" name="current-password" id="current-password">
                    </label>

                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>