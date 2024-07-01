

<div class="main-container">
    <div class="notification-bar">
        <h1>Welcome <?= $currentUser['name']?> !!!</h1>
        <div class="sub-headings">
            <div class="dynamic-content">
            </div>
            <div class="date-time">
                <span id="time"></span>
                <span id="date"></span>
                <script src="<?= js('date-time') ?>"></script>
            </div>
        </div>
    </div>

    <div class="staff-info">
        <div class="sub-container">
            <div class="tablet">On Duty Staff</div>
            <div class="input">21</div>
        </div>

        <div class="sub-container">
            <div class="tablet">Off Duty Staff</div>
            <div class="input">21</div>
        </div>

        <div class="sub-container">
            <div class="tablet">Staff on Leave</div>
            <div class="input">21</div>

        </div>
    </div>

    <div class="body">
        <div class="card">
            <?php require view("partials\calander"); ?>
        </div>
        <div class="card">
            <?php require view("partials\map"); ?>
        </div>
    </div>
</div>