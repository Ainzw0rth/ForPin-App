<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/post.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/modal.css">
    <title>ForPin | Post</title>
</head>
<body>
    <?php include('app/views/component/navbar.php'); ?>
    <div id="post-data" data-postdata="<?php echo htmlspecialchars(json_encode($data)); ?>"></div>
    <a>
        <button class="go-back" onClick="history.back()">
            <div class="button-circle">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none" class="button-arrow">
                    <path d="M0.635987 6.29302C0.448516 6.48055 0.343201 6.73486 0.343201 7.00002C0.343201 7.26519 0.448516 7.5195 0.635987 7.70702L6.29299 13.364C6.38523 13.4595 6.49558 13.5357 6.61758 13.5881C6.73959 13.6405 6.87081 13.6681 7.00359 13.6693C7.13637 13.6704 7.26804 13.6451 7.39094 13.5948C7.51384 13.5446 7.62549 13.4703 7.71938 13.3764C7.81327 13.2825 7.88753 13.1709 7.93781 13.048C7.98809 12.9251 8.01339 12.7934 8.01224 12.6606C8.01108 12.5278 7.9835 12.3966 7.93109 12.2746C7.87868 12.1526 7.8025 12.0423 7.70699 11.95L3.75699 8.00002H17C17.2652 8.00002 17.5196 7.89467 17.7071 7.70713C17.8946 7.51959 18 7.26524 18 7.00002C18 6.73481 17.8946 6.48045 17.7071 6.29292C17.5196 6.10538 17.2652 6.00002 17 6.00002L3.75699 6.00002L7.70699 2.05002C7.88914 1.86142 7.98994 1.60882 7.98766 1.34662C7.98538 1.08443 7.88021 0.833613 7.69481 0.648205C7.5094 0.462797 7.25858 0.357627 6.99639 0.355349C6.73419 0.35307 6.48159 0.453864 6.29299 0.636023L0.635987 6.29302Z" fill="white"/>
                </svg>
            </div>
        </button>
    </a>    
    <div class="card-container">
        <div class="card-cover">
            <?php $countPost = count($data['img']) + count($data['vid']) ?>
            <?php $count = 1; ?>
            <?php foreach ($data['img'] as $image) : ?>
            <div class="card-image mySlides">
            <?php if ($countPost > 1) {?>
                <div class="numbertext"><?= $count; ?>/<?= $countPost ?></div>
            <?php  }?>
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
            <?php if ($countPost > 1) {?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <?php  }?>
            </div>
        <div class="card-description">
            <div class = "card-text-1">

                <div class="card-additional">
                    <div class="card_profile_section">
                        <a href="<?= BASE_URL ?>/profile/<?= $data['user']['username'] ?>">
                            <img src="<?= $data['user']['profile_path'] ?>" class=profile-picture></img>
                        </a>
                        <a href="<?= BASE_URL ?>/profile/<?= $data['user']['username'] ?>">
                        <div class="card_profile_name_section">
                            <p class=text_capt><?= $data['user']['username'] ?></p>
                            <p class=text_desc><?= $data['user']['fullname'] ?></p>
                        </div>
                        </a>
                    </div>

                    <div class="additional-section">
                        <?php if ($data['post_user_id'] === $data['user_id']) {?>
                        <div class="button-circle">
                            <a class="edit-button" href="#open-modal-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                                    <path d="M18.3416 9.62002L8.29929 19.6624C8.28506 19.6766 8.27092 19.6907 8.25689 19.7047C8.04703 19.9141 7.86125 20.0995 7.73032 20.3308C7.59939 20.562 7.536 20.8167 7.4644 21.1044C7.45961 21.1236 7.45479 21.143 7.44991 21.1625L6.50951 24.9241C6.50665 24.9356 6.50377 24.9471 6.50088 24.9586C6.45019 25.161 6.39606 25.3771 6.3783 25.5587C6.35875 25.7585 6.36331 26.0957 6.6338 26.3662C6.90429 26.6367 7.24148 26.6413 7.44135 26.6217C7.62287 26.6039 7.83901 26.5498 8.0414 26.4991C8.05294 26.4962 8.06444 26.4933 8.07589 26.4905L11.8375 25.5501C11.857 25.5452 11.8764 25.5404 11.8956 25.5356C12.1833 25.464 12.438 25.4006 12.6692 25.2697C12.9005 25.1388 13.0859 24.953 13.2953 24.7431C13.3093 24.7291 13.3234 24.7149 13.3376 24.7007L23.38 14.6584L23.41 14.6283C23.8149 14.2235 24.1637 13.8747 24.4055 13.5578C24.6646 13.2182 24.8608 12.8405 24.8608 12.375C24.8608 11.9095 24.6646 11.5318 24.4055 11.1922C24.1637 10.8753 23.8149 10.5265 23.41 10.1217L23.38 10.0916L22.9084 9.62002L22.8783 9.58996C22.4735 9.1851 22.1247 8.83626 21.8078 8.59449C21.4682 8.33538 21.0905 8.13919 20.625 8.13919C20.1595 8.13919 19.7818 8.33538 19.4422 8.59449C19.1253 8.83626 18.7765 9.18509 18.3717 9.58994L18.3416 9.62002Z" stroke="white" stroke-width="1.29167"/>
                                    <path d="M17.1875 10.3125L21.3125 7.5625L25.4375 11.6875L22.6875 15.8125L17.1875 10.3125Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if ($data['is_admin'] || $data['post_user_id'] === $data['user_id']) {?>
                        <div class="button-circle">
                            <a class="delete-button" href="#open-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="25" viewBox="0 0 19 25" fill="none">
                                    <path d="M14.0625 3.51562V5.46875H17.5781C17.8889 5.46875 18.187 5.59221 18.4068 5.81198C18.6265 6.03175 18.75 6.32982 18.75 6.64062C18.75 6.95143 18.6265 7.2495 18.4068 7.46927C18.187 7.68904 17.8889 7.8125 17.5781 7.8125H1.17188C0.861074 7.8125 0.563003 7.68904 0.343234 7.46927C0.123465 7.2495 0 6.95143 0 6.64062C0 6.32982 0.123465 6.03175 0.343234 5.81198C0.563003 5.59221 0.861074 5.46875 1.17188 5.46875H4.6875V3.51562C4.6875 2.00625 5.9125 0.78125 7.42188 0.78125H11.3281C12.8375 0.78125 14.0625 2.00625 14.0625 3.51562ZM3.9 11.2109L4.93125 21.5234C4.94094 21.6199 4.98612 21.7092 5.05802 21.7742C5.12992 21.8392 5.22341 21.8751 5.32031 21.875H13.4297C13.5266 21.8751 13.6201 21.8392 13.692 21.7742C13.7639 21.7092 13.8091 21.6199 13.8187 21.5234L14.85 11.2109C14.8887 10.9082 15.044 10.6326 15.2829 10.4426C15.5217 10.2526 15.8252 10.1633 16.1288 10.1936C16.4325 10.224 16.7123 10.3716 16.9089 10.605C17.1054 10.8385 17.2031 11.1394 17.1813 11.4437L16.15 21.7562C16.0833 22.4312 15.7678 23.0572 15.265 23.5124C14.7621 23.9675 14.1079 24.2193 13.4297 24.2188H5.32031C4.64251 24.2187 3.9889 23.9668 3.48626 23.5121C2.98362 23.0574 2.66778 22.4322 2.6 21.7578L1.56875 11.4453C1.54918 11.2902 1.56086 11.1327 1.60311 10.9821C1.64536 10.8315 1.71732 10.6909 1.81474 10.5686C1.91217 10.4463 2.0331 10.3447 2.17039 10.2698C2.30769 10.1949 2.45859 10.1483 2.61419 10.1327C2.76979 10.117 2.92695 10.1327 3.0764 10.1787C3.22586 10.2248 3.36458 10.3002 3.48441 10.4007C3.60424 10.5012 3.70274 10.6247 3.77412 10.7638C3.84549 10.903 3.88829 11.055 3.9 11.2109ZM7.03125 3.51562V5.46875H11.7188V3.51562C11.7188 3.41202 11.6776 3.31267 11.6043 3.23941C11.5311 3.16616 11.4317 3.125 11.3281 3.125H7.42188C7.31827 3.125 7.21892 3.16616 7.14566 3.23941C7.0724 3.31267 7.03125 3.41202 7.03125 3.51562Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="card_media_description">
                    <p class=text_capt><?= $data['post']['caption'] ?></p>
                    <p class=text_desc><?= $data['post']['descriptions'] ?></p>
                    <div class="genres">
                        <?php $genreArray = explode(', ', $data['post']['genre']);
                            foreach ($genreArray as $genre) :?>
                            <a href="<?= BASE_URL; ?>/home/q=@c=<?= $genre ?>@f=0@s=0">
                                <p class="text_desc tags">#<?=$genre?></p>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="card_media_additional_desc">
                    <div class="post-time">
                        <p class="text_desc"><?= $data['post']['post_time'] ?></p>
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
        </div>
    </div>

    <!-- modal section -->
    <div id="open-modal" class="modal-window">
        <div>
            <p class="text-question">Are you sure?</p>
            <p class="text-desc">If you delete this post, it’ll be gone for good and you won’t be able to view it.</p>
            <br>
            
            <div class="modal-button-section">
                <button onClick="location.href='#'" class="normal-button">Cancel</button>
                <button onClick="location.href='<?= BASE_URL; ?>/post/delete/<?= $data['current'] ?>'" class="blue-button">Delete</button>
            </div>

        </div>
    </div>

    <div id="open-modal-2" class="modal-window">
        <div>
            <div class="top-edit-section">
                <p class="text-question">Edit Post</p>
                <div class="cancel-button-post">
                    <button onClick="location.href='#'">
                        <div class="button-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none" class="cancel-edit">
                                <path d="M24.75 8.25L8.25 24.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.25 8.25L24.75 24.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>

            <form class="upload-form">

                <label for="title" class="text-2">Title</label>
                <br>
                <input type="text" placeholder="Add a title" id="title" class="create-input-box" name="title">
                <p id="title-warn" class="warn-hide"></p>
                <br>

                <br>
                <label for="description" class="text-2">Description</label>
                <input type="text" placeholder="Write your detailed description bellow" id="description" name="description" class="desc-box"> 
                <br>
                <label for="genre" class="text-2">Choose a genre</label>
                <br>
                <select name="genre" id="genre" name="genre" class="post_genre_dropdown">
                </select>
                <br>
                <br>
                <label for="tags" class="text-2">Tags</label>
                <P class="tags-warn">Ex: tags1, tags2, tags3</P>
                <input type="text" placeholder="Add more tags" id="tags" name="tags" class="create-input-box">
                <p id="tags-warn-2" class="warn-hide"></p>
                <br>
                <br>
                <p id="upload-warn" class="warn-hide">Edit failed</p>
                <div class="edit-submit-button">
                    <input type="submit" name="edit-submit" value="Save" class="blue-button" id="edit-submit">
                </div>
            </form>
        </div>
    </div>

    <!-- modal section -->
    <div id="open-modal" class="modal-window">
        <div>
            <p class="text-question">Are you sure?</p>
            <p class="text-desc">If you delete this post, it’ll be gone for good and you won’t be able to view it.</p>
            <br>
            
            <div class="modal-button-section">
                <button onClick="location.href='#'" class="normal-button">Cancel</button>
                <button onClick="location.href='<?= BASE_URL; ?>/post/delete/<?= $data['current'] ?>'" class="blue-button">Delete</button>
            </div>

        </div>
    </div>

    <div id="open-modal-2" class="modal-window">
        <div>
            <div class="top-edit-section">
                <p class="text-question">Edit Post</p>
                <div class="cancel-button-post">
                    <button onClick="location.href='#'">
                        <div class="button-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none" class="cancel-edit">
                                <path d="M24.75 8.25L8.25 24.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.25 8.25L24.75 24.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>

            <form class="upload-form">

                <label for="title" class="text-2">Title</label>
                <br>
                <input type="text" placeholder="Add a title" id="title" class="create-input-box" name="title">
                <p id="title-warn" class="warn-hide"></p>
                <br>

                <br>
                <label for="description" class="text-2">Description</label>
                <input type="text" placeholder="Write your detailed description bellow" id="description" name="description" class="desc-box"> 
                <br>
                <label for="genre" class="text-2">Choose a genre</label>
                <br>
                <select name="genre" id="genre" name="genre" class="create-input-box">
                    <option value="happy">Happy</option>
                    <option value="sad">Sad</option>
                    <option value="horror">Horror</option>
                    <option value="humour">Humour</option>
                    <option value="fun">Fun</option>
                </select>
                <br>
                <label for="tags" class="text-2">Tags</label>
                <P class="tags-warn">Ex: tags1, tags2, tags3</P>
                <input type="text" placeholder="Add more tags" id="tags" name="tags" class="create-input-box">
                <p id="tags-warn-2" class="warn-hide"></p>
                
                <br>

                <p id="upload-warn" class="warn-hide">Edit failed</p>
                <div class="edit-submit-button">
                    <input type="submit" name="edit-submit" value="Save" class="blue-button" id="edit-submit">
                </div>
            </form>
        </div>
    </div>
    <script>
        const CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        const DEBOUNCE_TIMEOUT = "<?= DEBOUNCE_TIMEOUT ?>";
        var postId = <?= $data['current'] ?>;
    </script>
    <script src="<?= BASE_URL; ?>/public/javascript/debounce/debounce.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/navbar/navbar.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post/post.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post/carousel.js"></script>
    <script src="<?= BASE_URL; ?>/public/javascript/post/edit.js"></script>
</body>
</html>