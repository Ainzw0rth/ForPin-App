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

    <?php include('app/views/component/login.php'); ?>

    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
    </script>
    <p class="text-1">Session Token</p>
    <p class="text-1"><?= $_SESSION['csrf_token']; ?></p>
    <script src="<?= BASE_URL ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL ?>/public/javascript/login/login.js"></script>
</div>
</body>
</html>