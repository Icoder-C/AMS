    <div class="form-container">
        <h2>Apply for Leave</h2>
        <form action="" method="post">
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" required>
            <span class="error-msg"></span>

            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" required>
            <span class="error-msg"></span>


            <label for="leave_type">Type of Leave</label>
            <select id="leave_type" name="leave_type" required>
                <option value="sick">Sick Leave</option>
                <option value="vacation">Vacation Leave</option>
                <option value="personal">Personal Leave</option>
                <option value="other">Other</option>
            </select>
            <span class="error-msg"></span>

            <label for="reason">Reason</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>
            <span class="error-msg"></span>


            <button type="submit" class="btn-apply">Apply</button>
            <button type="button" class="btn-cancel" onclick="window.location.href='dashboard.php'">Cancel</button>
        </form>
    </div>