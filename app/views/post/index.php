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
                        <img src="<?= $data['user']['profile_path'] ?>" class=profile-picture></img>
                        <div class="card_profile_name_section">
                            <p class=text_capt><?= $data['user']['username'] ?></p>
                            <p class=text_desc><?= $data['user']['fullname'] ?></p>
                        </div>
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

        <div class="container">
        <div class="interior">
            <a class="btn" href="#open-modal">👋 Basic CSS-Only Modal</a>
        </div>
        </div>

        <div id="open-modal" class="modal-window">
        <div>
            <a href="#" title="Close" class="modal-close">Close</a>
            <h1>Voilà!</h1>
            <div>A CSS-only modal based on the :target pseudo-class. Hope you find it helpful.</div>
            <br>
            <div><small>Check out 👇</small></div>
            <a href="https://chrome.google.com/webstore/detail/chroma/pkgejkfioihnchalojepdkefnpejomgn?utm_campaign=chromapromo&utm_source=codepen.io" target="_blank">

            <svg class="logo" width="244" height="52" viewBox="0 0 244 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.6002 0.000182857V25.6002H51.2002C51.2002 18.8105 48.503 12.2992 43.7019 7.49824C38.9012 2.69714 32.3895 0 25.6 0L25.6002 0.000182857Z" fill="#F6BAC1" />
                <path d="M0.000182757 0.000182857V25.6002H25.6002C25.6002 18.8105 22.9031 12.2992 18.102 7.49824C13.3012 2.69714 6.78949 0 0 0L0.000182757 0.000182857Z" fill="#016B55" />
                <path d="M25.6002 25.6003V51.2003H51.2002C51.2002 44.4106 48.503 37.8993 43.7019 33.0983C38.9012 28.2972 32.3895 25.6001 25.6 25.6001L25.6002 25.6003Z" fill="#F39202" />
                <path d="M25.6001 38.4001C25.6001 45.4694 19.8694 51.2001 12.8001 51.2001C5.73086 51.2001 0.00012207 45.4694 0.00012207 38.4001C0.00012207 31.3308 5.73086 25.6001 12.8001 25.6001C19.8694 25.6001 25.6001 31.3308 25.6001 38.4001Z" fill="#68B5D8" />
                <path d="M97.7537 32.9839L96.8897 39.0319C95.6417 39.8639 94.3137 40.5039 92.9057 40.9519C91.4977 41.3679 90.0577 41.5759 88.5857 41.5759C84.9377 41.5759 81.9617 40.4079 79.6577 38.0719C77.3537 35.7359 76.2017 32.6799 76.2017 28.9039C76.2017 25.2559 77.4177 22.2319 79.8497 19.8319C82.3137 17.3999 85.4177 16.1839 89.1617 16.1839C90.7297 16.1839 92.1697 16.4079 93.4817 16.8559C94.7937 17.2719 96.0417 17.9439 97.2257 18.8719V25.2559H97.1297C95.6897 23.8799 94.3457 22.8879 93.0977 22.2799C91.8497 21.6399 90.5857 21.3199 89.3057 21.3199C87.1937 21.3199 85.4337 22.0399 84.0257 23.4799C82.6497 24.9199 81.9617 26.7119 81.9617 28.8559C81.9617 31.0639 82.6177 32.8719 83.9297 34.2799C85.2737 35.6879 86.9857 36.3919 89.0657 36.3919C90.4417 36.3919 91.8977 36.0879 93.4337 35.4799C94.9697 34.8399 96.3777 33.9919 97.6577 32.9359L97.7537 32.9839Z" fill="black" />
                <path d="M114.754 21.2719C113.666 21.2719 112.642 21.5279 111.682 22.0399C110.754 22.5519 109.65 23.4479 108.37 24.7279V40.9999H102.706V6.34387L108.37 4.56787V21.0799C109.65 19.3839 110.946 18.1519 112.258 17.3839C113.602 16.6159 115.106 16.2319 116.77 16.2319C119.33 16.2319 121.362 17.0799 122.866 18.7759C124.402 20.4719 125.17 22.7599 125.17 25.6399V40.9999H119.458V26.5039C119.458 24.8399 119.042 23.5599 118.21 22.6639C117.41 21.7359 116.258 21.2719 114.754 21.2719Z" fill="black" />
                <path d="M145.441 22.3759C144.065 22.3759 142.705 22.6639 141.361 23.2399C140.017 23.7839 138.497 24.7279 136.801 26.0719V40.9999H131.137V17.3359L136.753 16.3759V22.5199C138.545 20.1199 140.033 18.4879 141.217 17.6239C142.401 16.7599 143.649 16.3279 144.961 16.3279C145.217 16.3279 145.457 16.3439 145.681 16.3759C145.905 16.4079 146.177 16.4559 146.497 16.5199L146.881 22.5199C146.625 22.4559 146.385 22.4239 146.161 22.4239C145.937 22.3919 145.697 22.3759 145.441 22.3759Z" fill="black" />
                <path d="M161.795 41.6719C158.051 41.6719 154.963 40.4399 152.531 37.9759C150.131 35.5119 148.931 32.4879 148.931 28.9039C148.931 25.3519 150.163 22.3279 152.627 19.8319C155.091 17.3039 158.179 16.0399 161.891 16.0399C165.667 16.0399 168.755 17.2719 171.155 19.7359C173.555 22.1679 174.755 25.1759 174.755 28.7599C174.755 32.3439 173.523 35.3999 171.059 37.9279C168.595 40.4239 165.507 41.6719 161.795 41.6719ZM169.091 28.7599C169.091 26.5519 168.403 24.7119 167.027 23.2399C165.683 21.7679 163.971 21.0319 161.891 21.0319C159.779 21.0319 158.035 21.7839 156.659 23.2879C155.283 24.7919 154.595 26.6639 154.595 28.9039C154.595 31.1439 155.267 33.0159 156.611 34.5199C157.987 35.9919 159.715 36.7279 161.795 36.7279C163.907 36.7279 165.651 35.9759 167.027 34.4719C168.403 32.9359 169.091 31.0319 169.091 28.7599Z" fill="black" />
                <path d="M190.845 21.2719C189.853 21.2719 188.925 21.5119 188.061 21.9919C187.197 22.4719 186.189 23.3039 185.037 24.4879V40.9999H179.373V17.3359L184.989 16.3759V20.8879C186.237 19.2559 187.485 18.0719 188.733 17.3359C190.013 16.5999 191.421 16.2319 192.957 16.2319C194.685 16.2319 196.189 16.6959 197.469 17.6239C198.781 18.5199 199.725 19.7839 200.301 21.4159C201.645 19.5919 202.989 18.2799 204.333 17.4799C205.677 16.6479 207.181 16.2319 208.845 16.2319C211.309 16.2319 213.261 17.0799 214.701 18.7759C216.173 20.4719 216.909 22.7599 216.909 25.6399V40.9999H211.245V26.5039C211.245 24.8719 210.845 23.5919 210.045 22.6639C209.277 21.7359 208.189 21.2719 206.781 21.2719C205.789 21.2719 204.845 21.5279 203.949 22.0399C203.085 22.5199 202.077 23.3359 200.925 24.4879C200.957 24.6159 200.973 24.7599 200.973 24.9199C200.973 25.0799 200.973 25.3199 200.973 25.6399V40.9999H195.309V26.5039C195.309 24.8719 194.909 23.5919 194.109 22.6639C193.341 21.7359 192.253 21.2719 190.845 21.2719Z" fill="black" />
                <path d="M243.442 26.5999V40.4239L237.874 41.3839V37.3999C236.178 38.7439 234.562 39.7519 233.026 40.4239C231.522 41.0639 230.034 41.3839 228.562 41.3839C226.418 41.3839 224.69 40.7919 223.378 39.6079C222.098 38.4239 221.458 36.8399 221.458 34.8559C221.458 32.1359 222.802 30.1039 225.49 28.7599C228.21 27.4159 232.322 26.7119 237.826 26.6479C237.794 24.8559 237.33 23.5119 236.434 22.6159C235.57 21.6879 234.306 21.2239 232.642 21.2239C231.298 21.2239 229.906 21.5119 228.466 22.0879C227.058 22.6319 225.618 23.4479 224.146 24.5359L224.05 24.4879L225.058 18.7279C226.402 17.8959 227.762 17.2879 229.138 16.9039C230.546 16.4879 232.05 16.2799 233.65 16.2799C236.818 16.2799 239.234 17.1599 240.898 18.9199C242.594 20.6799 243.442 23.2399 243.442 26.5999ZM226.882 34.4239C226.882 35.2239 227.154 35.8639 227.698 36.3439C228.274 36.7919 229.074 37.0159 230.098 37.0159C231.058 37.0159 232.162 36.7919 233.41 36.3439C234.69 35.8959 236.162 35.2239 237.826 34.3279V29.8159C234.146 30.0719 231.394 30.5679 229.57 31.3039C227.778 32.0399 226.882 33.0799 226.882 34.4239Z" fill="black" />
            </svg>

            Your new favorite eyedropper tool!
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
                <button onClick="location.href='<?= BASE_URL; ?>/post/delete/<?= $data['post_id'] ?>'" class="blue-button">Delete</button>
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
                <!-- <p class="text-desc">If you delete this post, it’ll be gone for good and you won’t be able to view it.</p> -->
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

    <!-- modal section -->
    <div id="open-modal" class="modal-window">
        <div>
            <p class="text-question">Are you sure?</p>
            <p class="text-desc">If you delete this post, it’ll be gone for good and you won’t be able to view it.</p>
            <br>
            
            <div class="modal-button-section">
                <button onClick="location.href='#'" class="normal-button">Cancel</button>
                <button onClick="location.href='<?= BASE_URL; ?>/post/delete/<?= $data['post_id'] ?>'" class="blue-button">Delete</button>
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
                <!-- <p class="text-desc">If you delete this post, it’ll be gone for good and you won’t be able to view it.</p> -->
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