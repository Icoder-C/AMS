<nav>
    <div class="top">
        <img src="<?= res('logo.png') ?>" alt="Company Logo" id="logo">
        <h1 id="cmp_name">A.M.S.</h1>
    </div>
    <div class="middle">
        <ul class="nav-list">
            <li>
                <a href="#home">
                    <img src="<?= res('icons/home-white.svg') ?>" alt="Home Icon">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#profile">
                    <img src="<?= res('icons/user-white.svg') ?>" alt="Profile Icon">
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="#employees">
                    <img src="<?= res('icons/users-white.svg') ?>" alt="Employees Icon">
                    <span>Employees</span>
                </a>
            </li>
            <li>
                <a href="#attendance">
                    <img src="<?= res('icons/calendar-white.svg') ?>" alt="Attendance Icon">
                    <span>Attendance</span>
                </a>
            </li>
            <li>
                <a href="#leave">
                    <img src="<?= res('icons/leave-white.svg') ?>" alt="Leave Management Icon">
                    <span>Leave</span>
                </a>
            </li>
            <li>
                <a href="#logout">
                    <form action="/session" method="post">
                        <button><input type="hidden" name="_method" value="DELETE" />
                            <img src="<?= res('icons/logout-white.svg') ?>" alt="Log Out Icon">
                            <span>Log Out</span></button>
                    </form>
                </a>
            </li>
        </ul>
    </div>
</nav>