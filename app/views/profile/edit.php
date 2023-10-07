<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/edit_profile.css">
    <title>ForPin | Sign Up</title>
</head>
<body>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <?php include('app/views/component/navbar.php'); ?>
    
    <div class="edit_profile_section">
        <h1 class="edit_page_title">Edit profile</h1>
        <div class="edit_profile_photo_section" id="edit_profile_photo_section">
            <h2 class="subtitle">Photo</h2>
            <div class="edit_profile_photobutton_section" id="edit_profile_photobutton_section"></div>
        </div>
        <div class="edit_profile_username_section" id="edit_profile_username_section">
            <h2 class="subtitle">Username</h2>
            <input type="text" class="edit_profile_input_text" id="username_input">
            <h3 id="invalid_text_input_username" class="edit_warn-hide"></h3>
        </div>
        <div class="edit_profile_fullname_section" id="edit_profile_fullname_section">
            <h2 class="subtitle">Fullname</h2>
            <input type="text" class="edit_profile_input_text" id="fullname_input">
            <h3 id="invalid_text_input_fullname" class="edit_warn-hide"></h3>
        </div>
        <div class="edit_profile_password_section" id="edit_profile_password_section">
            <h2 class="subtitle">Password</h2>
            <input type="text" class="edit_profile_input_text" id="password_input">
            <h3 id="invalid_text_input_password" class="edit_warn-hide"></h3>
        </div>
        <div class="edit_profile_email_section" id="edit_profile_email_section">
            <h2 class="subtitle">Email</h2>
            <input type="text" class="edit_profile_input_text" id="email_input">
            <h3 id="invalid_text_input_email" class="edit_warn-hide"></h3>
        </div>
        <div class="confirm_or_cancel_section">
            <button class="cancel_edit_button" onclick="executeCancel()">Cancel</button>
            <button class="confirm_edit_button" onclick="executeEdit()">Save Changes</button>
        </div>
    </div>
    
    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
    </script>

    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/profile/edit_profile.js"></script>
</div>
</body>
</html>