<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/create.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/carousel.css">
    <title>ForPin | Create Post</title>
</head>
<body>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <?php include('app/views/component/navbar.php'); ?>
    <div class="upload-container align-center">
        <div>

            <div class="upload-template" id="upload-template">
                <?php 
                if ($data["success"] === "success") {
                    $fileNames = rtrim($data['filename'], ','); 
                    $fileNamesArray = explode(',', $fileNames);
                    foreach ($fileNamesArray as $finalFile) :?>
                    <div class="post-image">
                        <div class="mySlides">
                            <img src="<?= BASE_URL ?>/public/images/testing_images/<?= $finalFile; ?>" alt="gambar upload">
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (count($fileNamesArray) > 1) {?>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <?php } ?>
                <?php }  else { ?>
                    <div class="image-placeholder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="119" height="101" viewBox="0 0 119 101" fill="none">
                            <path d="M109.846 0H9.15385C6.72609 0 4.39778 0.96442 2.6811 2.6811C0.96442 4.39778 0 6.72609 0 9.15385V91.5385C0 93.9662 0.96442 96.2945 2.6811 98.0112C4.39778 99.7279 6.72609 100.692 9.15385 100.692H109.846C112.274 100.692 114.602 99.7279 116.319 98.0112C118.036 96.2945 119 93.9662 119 91.5385V9.15385C119 6.72609 118.036 4.39778 116.319 2.6811C114.602 0.96442 112.274 0 109.846 0ZM75.5192 27.4615C76.8771 27.4615 78.2044 27.8642 79.3334 28.6186C80.4624 29.3729 81.3424 30.4452 81.862 31.6997C82.3816 32.9541 82.5176 34.3345 82.2527 35.6663C81.9878 36.998 81.3339 38.2213 80.3738 39.1815C79.4136 40.1416 78.1903 40.7955 76.8586 41.0604C75.5268 41.3253 74.1464 41.1893 72.892 40.6697C71.6375 40.1501 70.5653 39.2701 69.8109 38.1411C69.0565 37.0121 68.6538 35.6848 68.6538 34.3269C68.6538 32.5061 69.3772 30.7599 70.6647 29.4724C71.9522 28.1849 73.6984 27.4615 75.5192 27.4615ZM9.15385 91.5385V75.5192L38.9038 45.7692L84.6731 91.5385H9.15385ZM109.846 91.5385H97.62L77.0239 70.9423L88.4662 59.5L109.846 80.8857V91.5385Z" fill="#868686"/>
                        </svg>
                    </div>
                <?php } ?>
            </div>
            
            <div class="upload-button-section">
                <form action="<?= BASE_URL ?>/create" method="POST" enctype="multipart/form-data" id="file-upload-form">
                    
                    <label for="file-input">
                        <div class="button-text-section">
                            <div class="upload-circle">
                                <?php if (isset($fileNamesArray)) { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <path d="M22.5167 10.4125L17.5583 5.51254L19.1917 3.87921C19.6389 3.43199 20.1884 3.20837 20.8402 3.20837C21.4919 3.20837 22.0411 3.43199 22.4875 3.87921L24.1208 5.51254C24.5681 5.95976 24.8014 6.49954 24.8208 7.13187C24.8403 7.76421 24.6264 8.3036 24.1792 8.75004L22.5167 10.4125ZM20.825 12.1334L8.45833 24.5H3.5V19.5417L15.8667 7.17504L20.825 12.1334Z" fill="black"/>
                                    </svg>
                                <?php } else { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 41 42" fill="none">
                                        <path d="M20.5002 8.84827L19.7754 8.12348L20.5002 7.3987L21.2249 8.12348L20.5002 8.84827ZM21.5252 24.2233C21.5252 24.7894 21.0663 25.2483 20.5002 25.2483C19.9341 25.2483 19.4752 24.7894 19.4752 24.2233L21.5252 24.2233ZM11.2337 16.6651L19.7754 8.12348L21.2249 9.57305L12.6833 18.1147L11.2337 16.6651ZM21.2249 8.12348L29.7666 16.6651L28.317 18.1147L19.7754 9.57305L21.2249 8.12348ZM21.5252 8.84827L21.5252 24.2233L19.4752 24.2233L19.4752 8.84827L21.5252 8.84827Z" fill="#222222"/>
                                        <path d="M8.5415 27.64L8.5415 29.3483C8.5415 31.2353 10.0712 32.765 11.9582 32.765L29.0415 32.765C30.9285 32.765 32.4582 31.2353 32.4582 29.3483V27.64" stroke="#222222" stroke-width="2.05"/>
                                        <rect x="8.5415" y="25.9316" width="23.9167" height="6.83333" rx="3.41667" fill="#7E869E" fill-opacity="0.25"/>
                                    </svg>
                                <?php } ?>
                            </div>
                            <div id="status" class="text-2"><?= $data['status'] ?></div>
                        </div>

                    </label>

                    <input type="file" name="files[]" multiple id="file-input" class="old-upload-button">
                    <input type="submit" name="submit" value="Upload" class="none" id="post-image-submit">

                </form>

            </div>

        </div>


        <?php if (isset($fileNamesArray)) { ?>
            <div>
                <form class="upload-form">
                    
                    <div class="upload-input">
                        <input type="hidden" name="filenames" value="<?= $fileNames; ?>" id="file-names">

                        <label for="title" class="text-2">Title</label>
                        <input type="text" placeholder="Add a title" id="title" class="create-input-box" name="title">
                        <p id="title-warn" class="warn-hide"></p>
                        
                        <label for="description" class="text-2">Description</label>
                        <input type="text" placeholder="Write your detailed description bellow" id="description" name="description" class="desc-box">
                        
                        <label for="genre" class="text-2">Choose a genre</label>
                        <select name="genre" id="genre" name="genre" class="create-category-dropdown">
                        </select>
                        
                        <label for="tags" class="text-2">Tags</label>
                        <P class="tags-warn">Ex: tags1, tags2, tags3</P>
                        <input type="text" placeholder="Add more tags" id="tags" name="tags" class="create-input-box">
                        <p id="tags-warn-2" class="warn-hide"></p>
                        

                        <p id="upload-warn" class="warn-hide">Publish failed</p>
                        <div class="publish-button">
                            <input type="submit" name="submit2" value="Publish" class="blue-button" id="submit-button-2">
                        </div>
        

                    </div>
                    
                </form>
            </div>
        <?php } ?>

    </div>
    
    <?php 
    $fileCount = 0;
    if(isset($fileNamesArray)) {
        $fileCount = count($fileNamesArray);
    } ?> 
    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
        var FILE_COUNT = <?= $fileCount ?>;
    </script>
    <script src="public/javascript/debounce/debounce.js"></script>
    <script src="public/javascript/navbar/navbar.js"></script>
    <script src="public/javascript/post/carousel.js"></script>
    <script src="public/javascript/create/fileupload.js"></script>
</body>
</html>