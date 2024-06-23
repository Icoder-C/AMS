<?php

// dd($_SESSION);
$response = $_SESSION['modal']['response'] ?? NULL;
$image = $_SESSION['modal']['imagePath'] ?? NULL;
$output = $_SESSION['modal']['output'] ?? NULL;

require view("partials/modal");
?>
<div class="leave">
    <div class="body">
        <div class="card">
            <div class="con">
                <?php require view("partials\calander"); ?>
            </div>
        </div>
        <!-- <div class="notification">
            <h1>Notification</h1>
            <h2>Applied Leave: </h2>
            <h2>Status: </h2>
            <h2>Leave Start Date: </h2>
            <h2>Leave End Date: </h2>
        </div> -->

    </div>

    <div class="topic">
        <h1>Apply Leave</h1>
    </div>
    <div class="leaves-catogery">

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/annual_leave.jpg') ?>" alt=""></div>
            <h1>Annual Leave</h1>
            <div class="flex-content">
                <h2>Category: Paid Leave</h2>
                <span>5</span>
            </div>
            <a href="/leave-apply?annual_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/casual_leave.png') ?>" alt=""></div>
            <h1>Casual Leave</h1>
            <div class="flex-content">
                <h2>Category: Unpaid Leave</h2>
                <span>15</span>
            </div>
            <a href="/leave-apply?casual_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/sick_leave.jpg') ?>" alt=""></div>
            <h1>Sick Leave</h1>
            <div class="flex-content">
                <h2>Category: Paid Leave</h2>
                <span>15</span>
            </div>
            <a href="/leave-apply?sick_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/wedding_leave.png') ?>" alt=""></div>
            <h1>Wedding Leave</h1>
            <div class="flex-content">
                <h2>Category: Paid Leave</h2>
                <span>5</span>
            </div>
            <a href="/leave-apply?wedding_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/mourn_leave.jpg') ?>" alt=""></div>
            <h1>Mourn Leave</h1>
            <div class="flex-content">
                <h2>Category: Paid Leave</h2>
                <span>13</span>
            </div>
            <a href="/leave-apply?mourn_leave">Apply</a>
        </div>


        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/paternity_leave.png') ?>" alt=""></div>
            <h1>Paternity Leave</h1>
            <div class="flex-content">
                <h2>Category: Paid Leave</h2>
                <span>15</span>
            </div>
            <a href="/leave-apply?paternity_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/ethnic_festival_leave.png') ?>" alt=""></div>
            <h1>Ethnic Festival Leave</h1>
            <div class="flex-content">
                <h2>Category: Unpaid Leave</h2>
                <span>10</span>
            </div>
            <a href="/leave-apply?ethnic_festival_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/examination_leave.jpg') ?>" alt=""></div>
            <h1>Examination Leaves</h1>
            <div class="flex-content">
                <h2>Category: Unpaid Leave</h2>
                <span>20</span>
            </div>
            <a href="/leave-apply?examination_leave">Apply</a>
        </div>

        <div class="leave-options">
            <div class="img-container"><img src="<?= res('leaves/maternity_leave.jpg') ?>" alt=""></div>
            <h1>Maternity Leave</h1>
            <div class="flex-content">
                <h2>Category: Paid Leave</h2>
                <span>98</span>
            </div>
            <a href="/leave-apply?maternity_leave">Apply</a>
        </div>
    </div>
</div>