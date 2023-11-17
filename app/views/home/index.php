<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/post_viewer.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/modal.css">
    <title>ForPin | Home</title>
</head>
<body>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <?php include('app/views/component/navbar.php'); ?>
    <?php include('app/views/component/post_viewer.php'); ?>

    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
        var userId = <?= $_SESSION['user_id'] ?>;
        var creatorUsernameUpgrade = "<?= $data['creator_username_upgrade'] ?>";
    </script>
    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post_viewer/post_viewer.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
</body>
</html>