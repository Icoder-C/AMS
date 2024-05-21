<div class="profile">
    <div class="profile-main">
        <div class="profile-form">
            <div class="form-user">
                <form action="#" method="post">
                    <div class="topic">
                        <h1>Personal Details</h1>
                    </div>

                    <div class="table">
                        <div class="field"><label for="fname">Name
                            </label>
                            <input readonly type="text" name="fname" id="fname">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="email">Email
                            </label>
                            <input readonly type="email" name="email" id="email">
                        </div>
                        <span class="error"></span>

                        <div class="field"><label for="phone">Phone Number
                            </label>
                            <input readonly type="text" name="phone" id="phone">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="doa">Date of Appointment
                            </label>
                            <input type="text" readonly name="doa" id="doa">
                        </div>
                        <span class="error"></span>
                    </div>

                </form>
            </div>
            <div class="form-official">
                <form action="<?= controller("application/employees/logic/storeEmployees") ?>" method="post">
                    <div class="topic">
                        <h1>Official Details</h1>
                        <!-- <button type="button">Edit</button> -->
                    </div>

                    <div class="table">
                        <div class="field"><label for="department">Department
                            </label>
                            <input type="text" name="department" id="department">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="position">Position
                            </label>
                            <input type="text" name="position" id="position">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="phone">Check In Time
                            </label>
                            <input type="time" name="phone" id="phone">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="check-out">Check Out Time
                            </label>
                            <input type="time" name="check-out" id="check-out">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="rate_p_hr">Basic Rate (/hour)
                            </label>
                            <input type="number" name="rate_p_hr" id="rate_p_hr">
                        </div>
                        <span class="error"></span>
                        <div class="field"><label for="supervisor">Supervisor
                            </label>
                            <input type="text" name="supervisor" id="supervisor">
                        </div>
                        <span class="error"></span>
                        <button id="changePw" type="submit">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>