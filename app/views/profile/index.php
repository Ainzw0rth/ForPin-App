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
        var subscriptionStatus = <?= $data['subscription_status'] ?>;
    </script>

    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post_viewer/post_viewer.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/profile/profile.js"></script>
</div>

    <div id="subscribe-modal" class="modal-window">
        <div>
            <div class="request-sent-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="76" viewBox="0 0 72 76" fill="none">
                    <path d="M24.45 39.5128L31.05 46.4677L47.55 29.0806" stroke="#77D4F8" stroke-width="4.96774" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.5 7.65283C24.5144 4.59583 30.2069 2.99064 36 3.00004C54.2259 3.00004 69 18.5684 69 37.7742C69 56.98 54.2259 72.5484 36 72.5484C17.7741 72.5484 3 56.98 3 37.7742C3 31.4418 4.6071 25.4989 7.4154 20.3871" stroke="#77D4F8" stroke-width="4.96774" stroke-linecap="round"/>
                </svg>
            </div>
            <p class="text-question">Request sent.</p>
            <br>
            
            <div class="modal-button-section">
                <button onClick="location.href='#'" class="blue-button">Close</button>
            </div>

        </div>
    </div>

</body>
</html>