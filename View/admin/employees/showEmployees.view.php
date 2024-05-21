<?php
$statement = $db->query("SELECT COUNT(*) AS temp_user_count FROM users");
$count = $statement->find()['temp_user_count'];
$perPage = 5;
$totalPages = ceil($count / $perPage);
$currentPage = getCurrentPage($totalPages);
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
                <img src="<?= photo("admin.jpg") ?>" alt="profile pic">
                <div class="img"></div>
                <div class="left-content">
                    <?= htmlspecialchars($row['name']) ?>
                    <?= htmlspecialchars($row['position']) ?>
                    <?= htmlspecialchars($row['department']) ?>
                </div>
                <div class="right-content">
                    <p>Status</p>
                    <div class="status"></div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php require view("partials/pagination"); ?>