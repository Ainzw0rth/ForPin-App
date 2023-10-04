<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/post.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/carousel.css">
    <title>ForPin | Post</title>
</head>
<body>
    <?php include('app/views/component/navbar.php'); ?>
    <div class="flex content-section">
        <a href="<?= BASE_URL; ?>/home">
            <button class="go-back">
                <div class="button-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none" class="button-arrow">
                        <path d="M0.635987 6.29302C0.448516 6.48055 0.343201 6.73486 0.343201 7.00002C0.343201 7.26519 0.448516 7.5195 0.635987 7.70702L6.29299 13.364C6.38523 13.4595 6.49558 13.5357 6.61758 13.5881C6.73959 13.6405 6.87081 13.6681 7.00359 13.6693C7.13637 13.6704 7.26804 13.6451 7.39094 13.5948C7.51384 13.5446 7.62549 13.4703 7.71938 13.3764C7.81327 13.2825 7.88753 13.1709 7.93781 13.048C7.98809 12.9251 8.01339 12.7934 8.01224 12.6606C8.01108 12.5278 7.9835 12.3966 7.93109 12.2746C7.87868 12.1526 7.8025 12.0423 7.70699 11.95L3.75699 8.00002H17C17.2652 8.00002 17.5196 7.89467 17.7071 7.70713C17.8946 7.51959 18 7.26524 18 7.00002C18 6.73481 17.8946 6.48045 17.7071 6.29292C17.5196 6.10538 17.2652 6.00002 17 6.00002L3.75699 6.00002L7.70699 2.05002C7.88914 1.86142 7.98994 1.60882 7.98766 1.34662C7.98538 1.08443 7.88021 0.833613 7.69481 0.648205C7.5094 0.462797 7.25858 0.357627 6.99639 0.355349C6.73419 0.35307 6.48159 0.453864 6.29299 0.636023L0.635987 6.29302Z" fill="white"/>
                    </svg>
                </div>
            </button>
        </a>    

        <div class="card-container">

            <div class="card-1">
                <!-- <div class="card-post"> -->
                    <div class="card-cover">
                        <?php $countPost = count($data['img']) + count($data['vid']) ?>
                        <?php $count = 1; ?>
                        <?php foreach ($data['img'] as $image) : ?>
                        <div class="card-image mySlides">
                            <div class="numbertext"><?= $count; ?>/<?= $countPost ?></div>
                            <img src="<?= $image['img_path']; ?>" alt="carousel image <?php $count; ?>">
                        </div>
                        <?php $count = $count + 1; ?>
                        <?php endforeach; ?>
                        <?php foreach ($data['vid'] as $vid) : ?>
                        <div class="card-image mySlides">
                            <div class="numbertext"><?= $count; ?>/<?= $countPost ?></div>
                            <video src="<?= $vid['vid_path']; ?>" controls>
                        </div>
                        <?php $count = $count + 1; ?>
                        <?php endforeach; ?>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                <!-- </div> -->

                <div class = "card-text-1">
                    <div class="flex align-center gap-10">
                        <img src="<?= $data['user']['profile_path'] ?>" class=profile-picture></img>
                        <div>
                            <p class=text-1><?= $data['user']['username'] ?></p>
                            <p class=text-2><?= $data['user']['fullname'] ?></p>
                        </div>
                    </div>
                    <p class=text-1><?= $data['post']['caption'] ?></p>
                    <p class=text-2><?= $data['post']['description'] ?></p>
                    <div class="genres">
                    <?php $genreArray = explode(', ', $data['post']['genre']);
                        foreach ($genreArray as $genre) :?>
                        <a href="<?= BASE_URL; ?>/home/<?= $genre ?>">
                            <p class="text-2 tags">#<?=$genre?></p>
                        </a>
                    <?php endforeach ?>
                    </div>
                    <div class="post-time">
                        <p class="text-2"><?= $data['post']['post_time'] ?></p>
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
    </div>
    <script>
        var postId = <?= $data['current'] ?>;
    </script>
    <script src="<?= BASE_URL; ?>/public/javascript/post/post.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post/carousel.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
</body>
</html>