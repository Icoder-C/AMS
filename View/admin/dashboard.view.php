<div class="main-container">
    <div class="accounts-icon">
        <img src="<?= res('icons/user-blue.svg'); ?>" alt="user">
    </div>

    <div class="notification-bar">
        <h1>Welcome <?= $user ?> !!!</h1>
        <div class="sub-headings">
            <div class="dynamic-content">
            <?php if (isset($_SESSION['user']['status'])): ?>
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

    <div class="body">
        <div class="calander">

        </div>
        <div class="map">
            
        </div>
    </div>
</div>