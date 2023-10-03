<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/login.css">
    <title>ForPin | Login</title>
</head>
<body>
    <?php include('app/views/component/navbar-login.php'); ?>
    <div id="login-component">
        <?php include('app/views/component/login.php'); ?>
    </div>
    <div class="none" id="signup-component">
        <?php include('app/views/component/signup.php'); ?>
    </div>
    <script src="public/javascript/login/login.js"></script>
</div>
</body>
</html>