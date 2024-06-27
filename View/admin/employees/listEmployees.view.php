<?php


$searchName = '%' . ($_GET['EmployeeName'] ?? '') . '%';
$EmployeeID=$_SESSION['user']['EmployeeID'];

$statement = $db->query(
    "SELECT COUNT(*) AS temp_user_count FROM users WHERE LOWER(name) LIKE :name",
    ["name" => $searchName]
);
$count = $statement->find()['temp_user_count'];
$perPage = 8;
$totalPages = ceil($count / $perPage);
$pagename = "List-Employees";
$currentPage = getCurrentPage($totalPages, $pagename);
$pages = generatePagination($totalPages, $currentPage);

$offSet = max(0, $perPage * ($currentPage - 1));

$query = "SELECT * FROM users WHERE LOWER(name) LIKE :name AND EmployeeID <>:EmployeeID LIMIT $perPage OFFSET $offSet";
$statement = $db->query($query, ["name" => $searchName, "EmployeeID"=>$EmployeeID]);
$results = $statement->findAll();
// dd($results);

// dd(file_exists(basePath('/public'.photo($row["photo_name"]))) ? photo($row["photo_name"]) : photo("admin.jpg"));
?>
<div class="Employees">
    <div class="topic">
        <h1>Employees</h1>
        <div class="search">
            <form method="Get">
                <input type="text" name="EmployeeName" id="EmployeeName" value="<?= $_GET['EmployeeName'] ?? "" ?>">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="cards">
        <?php
        $i = $offSet + 1;
        foreach ($results as $row) {
        ?>
            <a href="/employees/view-profile?id=<?=$row['EmployeeID']?>" class="card">
            <!-- <div class="card"> -->
                <div class="img-container">
                    <img src="<?= $row["photo_name"] && file_exists(basePath('/public'.photo($row["photo_name"]))) ? photo($row["photo_name"]) : photo("admin.jpg")?>" alt="<?= htmlspecialchars($row['name']) ?>"></div>
                <div class="flex-content">
                    <div class="left-content">
                        <h1><?= htmlspecialchars($row['name'] ?? "Not yet inserted") ?></h1>
                        <h1><?= htmlspecialchars($row['position'] ?? "No Position") ?></h1>
                        <h1><?= htmlspecialchars($row['department'] ?? "No Department") ?></h1>
                    </div>
                    <div class="right-content">
                        <span>Status</span>
                        <div class="<?= $row['status'] ?? "default" ?>"></div>
                    </div>
                </div>
            <!-- </div> -->
            </a>
        <?php
        }
        ?>
    </div>
    <div class="list-pagination">
        <?php require view("partials/pagination"); ?>
    </div>
</div>