<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/edit_profile.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/modal.css">
    <title>ForPin | Edit Profile</title>
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
        <form action="<?= BASE_URL ?>/profile/editUserDesc" method="POST">
            <input type="hidden" name="profile_path" value="<?= $data['user']['profile_path']; ?>" id="file-names">
            <div class="edit_profile_username_section" id="edit_profile_username_section">
                <h2 class="subtitle">Username</h2>
                <input type="text" class="edit_profile_input_text" id="username_input" name="username">
                <h3 id="invalid_text_input_username" class="edit_warn-hide"></h3>
            </div>
            <div class="edit_profile_fullname_section" id="edit_profile_fullname_section">
                <h2 class="subtitle">Fullname</h2>
                <input type="text" class="edit_profile_input_text" id="fullname_input" name="fullname">
                <h3 id="invalid_text_input_fullname" class="edit_warn-hide"></h3>
            </div>
            <div class="edit_profile_password_section" id="edit_profile_password_section">
                <h2 class="subtitle">Password</h2>
                <input type="password" class="edit_profile_input_text" id="password_input" name="password"> 
                <h3 id="invalid_text_input_password" class="edit_warn-hide"></h3>
            </div>
            <div class="edit_profile_email_section" id="edit_profile_email_section">
                <h2 class="subtitle">Email</h2>
                <input type="text" class="edit_profile_input_text" id="email_input" name="email">
                <h3 id="invalid_text_input_email" class="edit_warn-hide"></h3>
            </div>
            <input type="submit" name="user-change-submit" value="Upload" class="none" id="change-user-desc">
        </form>
        <div class="confirm_or_cancel_section">
            <button class="cancel_edit_button" onclick="executeCancel()">Cancel</button>
            <button class="confirm_edit_button" onclick="executeEdit()">Save Changes</button>
        </div>
    </div>

    <div id="change-profpic" class="modal-window">
        <div class="change-section">
            <p class="text-question">Change your picture</p>
            <form action="<?= BASE_URL ?>/profile/edit" method="POST" enctype="multipart/form-data" id="profpic-form">

                <label for="profpic-input">
                    <div class="choose-photo-button">Choose photo</div>
                </label>
                <input type="file" name="file" id="profpic-input" class="none" accept="image/*">
                <input type="submit" name="submit-profpic" value="Upload" class="none" id="change-profpic-submit">
            
            </form>
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