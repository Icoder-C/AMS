<div class="main-container">
    <div class="accounts-icon">
        <img src="<?= res('icons/user-blue.svg'); ?>" alt="user">
    </div>

    <div class="notification-bar">
        <h1>Welcome <?= $user ?> !!!</h1>
        <span id="time"></span>
        <span id="date"></span>
    <script src="<?= js('date-time') ?>"></script>
    </div>
</div>
