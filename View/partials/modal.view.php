
<div id="myModal" class="modal" style="display: <?= isset($response) ? 'block' : 'none' ?>;">
    <!-- <link rel="stylesheet" href="<//?= css('partials/modal') ?>"> -->
    <div class="modal-content">
        <div class="close-opt">
            <span class="close">&times;</span>
        </div>
        <img src="<?= isset($image) ? res('icons/'.$image) : '' ?>" alt="Automated Reporting">
        <p><?= isset($response) ? $response : '' ?></p>
    </div>
    <script>
        var response = <?= json_encode($response) ?>;
        var image = <?= json_encode($image) ?>;
    </script>
    <script src="<?= js('modal') ?>"></script>
</div>
<?php
 unset($_SESSION['modal']);
?>
