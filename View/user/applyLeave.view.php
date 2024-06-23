    <div class="form-container">
        <h2>Apply for Leave</h2>
        <form action="leave/validate-leave" method="post">
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="<?= $_POST['start_date']??NULL ?>">
            <span class="error"><?php if (isset($errors['startDate'])) : ?>
                    <?= $errors['startDate'] ?>
                <?php endif; ?></span>

            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="<?= $_POST['end_date']??NULL ?>">
            <span class="error"><?php if (isset($errors['endDate'])) : ?>
                    <?= $errors['endDate'] ?>
                <?php endif; ?></span>


            <label for="leave_type">Type of Leave</label>
            <select name="leave_type" id="leave_type">
                <?php
                    $selected = $_POST['leave_type']??NULL;
                    $leave_type = [
                        [
                            "label" => "Select",
                            "value" => ""
                        ],
                        [
                            "label" => "Annual Leave",
                            "value" => "annual_leave"
                        ],
                        [
                            "label" => "Casual Leave",
                            "value" => "casual_leave"
                        ],
                        [
                            "label" => "Sick Leave",
                            "value" => "sick_leave"
                        ],
                        [
                            "label" => "Wedding Leave",
                            "value" => "wedding_leave"
                        ],
                        [
                            "label" => "Mourn Leave",
                            "value" => "mourn_leave"
                        ],
                        [
                            "label" => "Paternity Leave",
                            "value" => "paternity_leave"
                        ],
                        [
                            "label" => "Ethnic Festival Leave",
                            "value" => "ethnic_leave"
                        ],
                        [
                            "label" => "Examination Leave",
                            "value" => "exam_leave"
                        ],
                        [
                            "label" => "Maternity Leave",
                            "value" => "maternity_leave"
                        ]
                    ];
                    
                    foreach ($leave_type as $leave) :
                    ?>
                        <option value="<?= $leave["value"] ?>" <?= $leave["value"] == $selected ? 'selected' : '' ?>><?= $leave['label'] ?></option>
                    <?php endforeach; ?>
                </select>
            <span class="error"><?php if (isset($errors['type'])) : ?>
                    <?= $errors['type'] ?>
                <?php endif; ?></span>

            <label for="reason">Reason</label>
            <textarea id="reason" name="reason" rows="2"><?= $_POST['reason']??NULL?></textarea>
            <span class="error"><?php if (isset($errors['longText'])) : ?>
                    <?= $errors['longText'] ?>
                <?php endif; ?></span>


            <button type="submit" class="btn-apply">Apply</button>
            <button type="button" class="btn-cancel" onclick="window.location.href='leave.php'">Cancel</button>
        </form>
    </div>