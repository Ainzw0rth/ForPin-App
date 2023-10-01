<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <title>ForPin | Home</title>
</head>
<body>
    <?php include('app/views/component/navbar.php'); ?>
    <p class="text-1 flex justify-center align-center">Hello <?php echo $data['user'][0]['nama'] ?></p>
</body>
</html>