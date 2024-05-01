<nav>
    <div class="top">
        <img src="<?= res('logo.png') ?>" alt="Company Logo" id="logo">
        <h1 id="cmp_name">A.M.S.</h1>
    </div>
    <div class="middle">
        <ul class="nav-list">
            <li>
                <a href="#home">
                    <img src="<?= res('icons/home-white.svg') ?>" alt="Home Icon" id="home">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#profile">
                    <img src="<?= res('icons/user-white.svg') ?>" alt="Profile Icon" id="profile">
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="#attendance">
                    <img src="<?= res('icons/calendar-white.svg') ?>" alt="Attendance Icon" id="attendance">
                    <span>Attendance</span>
                </a>
            </li>
            <li>
                <a href="#leave">
                    <img src="<?= res('icons/leave-white.svg') ?>" alt="Leave Management Icon" id="leave">
                    <span>Leave</span>
                </a>
            </li>
            <li>
                <a href="#report">
                    <img src="<?= res('icons/report-white.svg') ?>" alt="Report-icon" id="report">
                    <span>Report</span>
                </a>
            </li>
            <li>
                <a href="#logout">
                    <form action="/session" method="post">
                        <button><input type="hidden" name="_method" value="DELETE" />
                            <img src="<?= res('icons/logout-white.svg') ?>" alt="Log Out Icon" id="logout">
                            <span>Log Out</span></button>
                    </form>
                </a>
            </li>
        </ul>
    </div>
</nav>