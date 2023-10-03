<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/globals.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>/public/css/create.css">
    <title>ForPin | Create Post</title>
</head>
<body>
    <?php include('app/views/component/navbar.php'); ?>
    <div class="publish">  
        <button class="blue-button">Publish</button>  
    </div>  
    <div class="upload-container align-center">

        <div class="upload">
            <div class="upload-rectangle">
                <div class="upload-text-button">
                    <button class="upload-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="42" viewBox="0 0 41 42" fill="none">
                            <path d="M20.5002 8.84827L19.7754 8.12348L20.5002 7.3987L21.2249 8.12348L20.5002 8.84827ZM21.5252 24.2233C21.5252 24.7894 21.0663 25.2483 20.5002 25.2483C19.9341 25.2483 19.4752 24.7894 19.4752 24.2233L21.5252 24.2233ZM11.2337 16.6651L19.7754 8.12348L21.2249 9.57305L12.6833 18.1147L11.2337 16.6651ZM21.2249 8.12348L29.7666 16.6651L28.317 18.1147L19.7754 9.57305L21.2249 8.12348ZM21.5252 8.84827L21.5252 24.2233L19.4752 24.2233L19.4752 8.84827L21.5252 8.84827Z" fill="#222222"/>
                            <path d="M8.5415 27.64L8.5415 29.3483C8.5415 31.2353 10.0712 32.765 11.9582 32.765L29.0415 32.765C30.9285 32.765 32.4582 31.2353 32.4582 29.3483V27.64" stroke="#222222" stroke-width="2.05"/>
                            <rect x="8.5415" y="25.9316" width="23.9167" height="6.83333" rx="3.41667" fill="#7E869E" fill-opacity="0.25"/>
                        </svg>
                    </button>
                    <div class="text-2">Choose a file or drag and drop it here</div>
                </div>
            </div>
        </div>

        <div class="upload-input">

            <p class="text-2">Title</p>
            <form action="" id="title-input" class="create-bar">
                <input type="text" placeholder="Add a title" id="titlebox" class="create-input-box">
            </form>

            <p class="text-2">Description</p>
            <form action="" id="title-input" class="create-bar">
                <input type="text" placeholder="Write your detailed description bellow" id="titlebox" class="desc-box">
            </form>
            
            <p class="text-2">Genres</p>
            
            <p class="text-2">Link</p>
            <form action="" id="title-input" class="create-bar">
                <input type="text" placeholder="Add a link" id="titlebox" class="create-input-box">
            </form>

            <p class="text-2">Tags</p>
            <form action="" id="title-input" class="create-bar">
                <input type="text" placeholder="Add your tags" id="titlebox" class="create-input-box">
            </form>
        </div>
    </div>
    




    <script src="public/javascript/navbar/navbar.js"></script>
</body>
</html>