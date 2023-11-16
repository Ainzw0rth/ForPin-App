<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/post_viewer.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/modal.css">
    <title>ForPin | Profile</title>
</head>
<body>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <?php include('app/views/component/navbar.php'); ?>
    <div class="user_profile_section" id="profile_section"></div>
    <div class="user_posts_section">
        <h1>User's posts</h1>
        <h1><?php $data['user_id'] ?></h1>
        <h1><?php $data['user_id'] ?></h1>
        <?php include('app/views/component/post_viewer.php'); ?>
    </div>
    
    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
        const currentId = <?= $data['user_id'] ?>;
        const sessionId = <?= $_SESSION['user_id'] ?>;
        var userId = <?= $_SESSION['user_id'] ?>;
        var premium = <?= $data['premium'] ?>;
    </script>

    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post_viewer/post_viewer.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/profile/profile.js"></script>
</div>
</body>
</html>