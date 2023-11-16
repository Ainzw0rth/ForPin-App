<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/settings.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/modal.css">
    <title>ForPin | Settings</title>
</head>
<body>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <?php include('app/views/component/navbar.php'); ?>
    <p class="settings-title">List of Users</p>

    <div class="row">
    <?php foreach ($data['users'] as $user) : ?>
        <?php if ($user['user_id'] != $_SESSION['user_id']) { ?>
            <div class="column">
                <div class="card">
                    <div class="pic-text">
                        <a href="<?= BASE_URL ?>/profile/<?= $user['username'] ?>">
                            <img src="<?= $user['profile_path'] ?>" alt="user profile picture" class="current_profile_pfp">
                        </a>
                        <div>
                            <p class="text_capt"><?= $user['username'] ?></p>
                            <p class="text_desc"><?= $user['fullname'] ?></p>
                        </div>
                    </div>
                    <a href="#delete-account-<?= $user['user_id'] ?>" class="delete-account-button">Delete account</a>
                </div>
            </div>

            <div id="delete-account-<?= $user['user_id'] ?>" class="modal-window">
                <div class="delete-modal">
                    <div class="modal-user-desc">
                        <img src="<?= $user['profile_path'] ?>" alt="user profile pict" class="current_profile_pfp">
                        <p class="username-text"><?= $user['username'] ?></p>
                    </div>
                    <div>
                        <p class="text-question">Delete this account</p>
                        <p class="text-desc">Deleting this account means you won't be able to see the Posts back. All this account ForPin account data will be deleted</p>
                    </div>
                    <div class="modal-button-section">
                        <button onClick="location.href='#'" class="normal-button">Cancel</button>
                        <button onClick="location.href='<?= BASE_URL; ?>/profile/delete/<?= $user['user_id'] ?>'" class="delete-account-button">Delete account</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>
    </div>


    



    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
        var userId = <?= $_SESSION['user_id'] ?>
    </script>
    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
</body>
</html>