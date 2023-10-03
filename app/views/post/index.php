<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/post.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <title>ForPin | Post</title>
</head>
<body>
    <?php include('app/views/component/navbar.php'); ?>
    <div class="center-container">
        <div class=black-rectangle>
            <!-- should use for each and carousel for multiple post -->
                <!-- <?php foreach ($data['img'] as $image): ?>
                    <img src="<?= $image['img_path'] ?>" alt="Image">
                <?php endforeach; ?> -->
                <img src="<?= $data['img'][0]['img_path'] ?>" class="image-container img-black-rectangle"></img>
                <!-- load video too -->
            <div class="content-container">
                <div class="flex padding-25 align-center gap-10">
                    <img src="<?= $data['user']['profile_path'] ?>" class=profile-picture></img>
                    <div>
                        <p class=text-1><?= $data['user']['username'] ?></p>
                        <p class=text-2><?= $data['user']['fullname'] ?></p>
                    </div>
                    <div class="save-button">
                        <button class="blue-button none">Save</button>
                    </div> 
                </div>
                <div class="padding-25">
                    <p class=text-1><?= $data['post']['caption'] ?></p>
                    <p class=text-2><?= $data['post']['description'] ?></p>
                </div>
                <div class="svg-container">
                    <p class=text-1-normal id="likes_number"><?= $data['post']['likes'] ?></p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none" id="likes" class="pointer">
                        <path d="M6.86141 21.4418L17.58 31.5108L17.58 31.5108C17.9493 31.8576 18.1339 32.031 18.3515 32.0738C18.4495 32.093 18.5504 32.093 18.6484 32.0738C18.8661 32.031 19.0507 31.8576 19.4199 31.5108L30.1385 21.4418C33.1543 18.6088 33.5205 13.9468 30.9841 10.6776L30.5072 10.0629C27.4729 6.1521 21.3823 6.80798 19.2502 11.2752C18.9491 11.9062 18.0508 11.9062 17.7497 11.2752C15.6176 6.80798 9.52703 6.1521 6.49276 10.0629L6.01583 10.6776C3.47942 13.9468 3.84564 18.6088 6.86141 21.4418Z" stroke="white" stroke-width="1.54167"  id="heart"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <script>
        var postId = <?= $data['current'] ?>;
    </script>
    <script src="<?= BASE_URL; ?>/public/javascript/post/post.js"></script>
</body>
</html>