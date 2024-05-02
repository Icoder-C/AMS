<div class="main-container">
    <div class="notification-bar">
        <h1>Welcome <?= $user ?> !!!</h1>
        <div class="sub-headings">
            <div class="dynamic-content">
                <?php if (isset($_SESSION['user']['status'])) : ?>
                    <li>
                        <div class="checkin">Current Status</div>
                    </li>
                    <li>
                        <div class="checkin">Checked Time</div>
                    </li>
                    <li>
                        <div class="checkin">Checed Out</div>
                    </li>
                <?php endif; ?>
            </div>
            <div class="date-time">
                <span id="time"></span>
                <span id="date"></span>
                <script src="<?= js('date-time') ?>"></script>
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="forms-input">
            <form action="/check-in" method="post">
                <button type="submit">Check In</button>
            </form>
        </div>
        <div class="forms-input">
            <form action="/check-out" method="post">
                <button type="submit">Check Out</button>
            </form>
        </div>
        <div class="forms-input">
            <form action="/leave-apply" method="post">
                <button type="submit">Apply Leave</button>
            </form>
        </div>
    </div>

    <div class="body">
        <div class="card">
            <?= require view("partials\calander"); ?>
        </div>
        <div class="card">
            <div class="con">
                <?= require view("partials\map"); ?>
            </div>
        </div>
    </div>
</div>