<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css('reset') ?>">
    <link rel="stylesheet" href="<?= css('variables') ?>">
    <link rel="stylesheet" href="<?= css('global') ?>">
    <link rel="stylesheet" href="<?= css('font') ?>">
    <link rel="stylesheet" href="<?= css('app/partials/pagination') ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" <?= is_array($style) ? arrayToAttributesString($style) : "href=\"{$style}\"" ?> />
    <?php endforeach; ?>

    <?php foreach ($headScripts as $headScript) : ?>
        <script <?= is_array($headScript) ? arrayToAttributesString($headScript) : "src=\"{$headScript}\"" ?>></script>
    <?php endforeach; ?>
    <title><?= $pageTitle?></title>
</head>

<body>

    <main>
        <div class="parent">
            <div class="child">
                <?php require $navLayout ?>
            </div>

            <div class="child2">
                <?php require view('partials/icon'); ?>
                <?php require $dashboardLayout ?>
            </div>
        </div>

    </main>

    <?php foreach ($bodyScripts as $bodyScript) : ?>
        <script <?= is_array($bodyScript) ? arrayToAttributesString($bodyScript) : "src=\"{$bodyScript}\"" ?>></script>
    <?php endforeach; ?>
</body>

</html>