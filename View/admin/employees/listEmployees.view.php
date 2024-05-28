<?php
$statement = $db->query("SELECT COUNT(*) AS temp_user_count FROM users");
$count = $statement->find()['temp_user_count'];
$perPage = 8;
$totalPages = ceil($count / $perPage);
$pagename="List-Employees";
$currentPage = getCurrentPage($totalPages,$pagename);
$pages = generatePagination($totalPages, $currentPage);

$offSet = ($perPage * ($currentPage - 1));

$query = "SELECT * FROM users LIMIT $perPage OFFSET $offSet";
$statement = $db->query($query);
$results = $statement->findAll();
?>
<div class="Employees">
    <div class="topic">
        <h1>Employees</h1>
    </div>
    <div class="cards">
        <?php
        $i = $offSet + 1;
        foreach ($results as $row) {
        ?>
            <div class="card">
                <div class="img-container"><img src="<?= photo("admin.jpg") ?>" alt="<?= htmlspecialchars($row['name']) ?>"></div>
                <div class="flex-content">
                    <div class="left-content">
                        <h1><?= htmlspecialchars($row['name'] ?? "Not yet inserted") ?></h1>
                        <h1><?= htmlspecialchars($row['position'] ?? "No Position") ?></h1>
                        <h1><?= htmlspecialchars($row['department'] ?? "No Department") ?></h1>
                    </div>
                    <div class="right-content">
                        <span>Status</span>
                        <div class="<?= $row['status']?? "default" ?>"></div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
   <div class="list-pagination">
   <?php require view("partials/pagination"); ?>
   </div>
</div>