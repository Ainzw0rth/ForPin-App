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
            <label for="username_input" class="subtitle">Username</label>
            <div class="edit_profile_username_section" id="edit_profile_username_section">
                <input type="text" class="edit_profile_input_text" id="username_input" name="username">
                <h3 id="invalid_text_input_username" class="edit_warn-hide"></h3>
            </div>
            <label for="fullname_input" class="subtitle">Fullname</label>
            <div class="edit_profile_fullname_section" id="edit_profile_fullname_section">
                <input type="text" class="edit_profile_input_text" id="fullname_input" name="fullname">
                <h3 id="invalid_text_input_fullname" class="edit_warn-hide"></h3>
            </div>
            <label for="password_input" class="subtitle">Password</label>
            <div class="edit_profile_password_section" id="edit_profile_password_section">
                <input type="password" class="edit_profile_input_text" id="password_input" name="password"> 
                <h3 id="invalid_text_input_password" class="edit_warn-hide"></h3>
            </div>
            <label for="email_input" class="subtitle">Email</label>
            <div class="edit_profile_email_section" id="edit_profile_email_section">
                <input type="text" class="edit_profile_input_text" id="email_input" name="email">
                <h3 id="invalid_text_input_email" class="edit_warn-hide"></h3>
            </div>
            <input type="submit" name="user-change-submit" value="Upload" class="none" id="change-user-desc">
        </form>
        <div class="confirm_or_cancel_section">
            <button class="cancel_edit_button" onclick="executeCancel()">Cancel</button>
            <button class="confirm_edit_button" onclick="executeEdit()">Save Changes</button>
        </div>
        
        <div class="delete-account-section">
            <a href="#delete-account" class="delete-account-button">Delete account</a>
        </div>
    </div>

    <!-- modal section -->
    <div id="change-profpic" class="modal-window">
        <div class="change-section">
            <div class="cancel-button-circle">
                <button onClick="location.href='#'">
                    <div class="button-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none" class="cancel-edit">
                            <path d="M24.75 8.25L8.25 24.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.25 8.25L24.75 24.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </button>
            </div>
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

    <!-- modal section -->
    <div id="delete-account" class="modal-window">
        <div class="delete-modal">
            <div class="modal-user-desc">
                <img src="<?= $data['user']['profile_path'] ?>" alt="user profile pict" class="current_profile_pfp">
                <p class="username-text"><?= $data['user']['username'] ?></p>
            </div>
            <div>
                <p class="text-question">Delete your account</p>
                <p class="text-desc">Deleting your account means you won't be able to get your Posts back. All your ForPin account data will be deleted</p>
            </div>
            
            <div class="modal-button-section">
                <button onClick="location.href='#'" class="normal-button">Cancel</button>
                <button onClick="location.href='<?= BASE_URL; ?>/profile/delete'" class="delete-account-button">Delete account</button>
            </div>

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