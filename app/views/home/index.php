<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/homepage.css">
    <title>ForPin | Home</title>
</head>
<body>
    <?php include('app/views/component/navbar.php'); ?>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <div class="container_media">
        <div class="media_canvas" id="media_canvas"></div>
        <div class="page_selector" id="page_selector">
        </div>
    </div>

    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
    </script>
    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/homepage/homepage.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
</body>
</html>