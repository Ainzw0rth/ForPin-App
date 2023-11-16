<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/exceptionerror.css">
    <title>ForPin | Error</title>
</head>
<body>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    
    <div class="error_page_container">
        <div class="error_container", id="error_container">
            <h1>Error code</h1>
        </div>
        <img src="http://localhost:80/public/images/error.gif" alt="error gif" class="error_animation">
    </div>
    
    
    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
    </script>
    <script src="<?= BASE_URL ?>/public/javascript/exceptionerror/exceptionerror.js"></script>

</body>
</html>