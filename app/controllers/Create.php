<?php


class Create extends Controller {
    public function index() {
        $data['status'] = "Choose files here";
        $data['success'] = "";
        if ( isset($_POST['submit']) ) {
            $data['status'] = "Already uploaded files";
            $uploadDir =  '/var/www/html/public/images/testing_images/';
            $allowedTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4');
    
            $maxSize = 10 * 1024 * 1024;
            
            if ( !empty(array_filter($_FILES['files']['name'])) ) {
                $data['status'] = "";
                $data['filename'] = "";
                foreach ($_FILES['files']['tmp_name'] as $key => $value) {
                    $fileTmpname = $_FILES['files']['tmp_name'][$key];
                    $fileName = $_FILES['files']['name'][$key];
                    $fileSize = $_FILES['files']['size'][$key];
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    
                    $filePath = $uploadDir.$fileName;
    
                    if ( in_array(strtolower($fileExt), $allowedTypes) ) {
                        if ($fileSize > $maxSize) {
                            $data['status'] = "Error: File size is larger than the allowed limit.";
                            $data["success"] = "";
                        }
                        if ( file_exists($filePath) ) {
                            $fileName = time().$fileName;
                            $filePath = $uploadDir.$fileName;
                            if ( move_uploaded_file($fileTmpname, $filePath) ) {
                                $data['status'] .= "{$fileName} sucessfully uploaded"; 
                                $data['success'] = "success";
                                $data['filename'] .= "{$fileName},"; 
                            } else {
                                $data['status'] = "Error uploading {$fileName}";
                                $data["success"] = "";
                            }
                        } else {
                            if ( move_uploaded_file($fileTmpname, $filePath) ) {
                                $data['status'] .= "{$fileName} sucessfully uploaded"; 
                                $data['success'] = "success";
                                $data['filename'] .= "{$fileName},"; 
                            } else {
                                $data['status'] = "Error uploading {$fileName}";
                                $data["success"] = "";
                            }
                        }
                    } else {
                        $data['status'] .= "Error uploading {$fileName}";
                        $data['status'] .= " {$fileExt} file type is not allowed";
                        $data["success"] = "";

                    }
    
                }
            }
        }
        $this->view('create/index', $data);
    }

    public function insertData() {
        $dir = BASE_URL . '/public/images/testing_images/';
        $fileNames = $_POST['filenames'];
        $fileNames = rtrim($fileNames, ','); 
        $fileNamesArray = explode(',', $fileNames);
        $title = "";
        $desc = "";
        $genres = "";
        if ( isset($_POST['title']) ) {
            $title = $_POST['title'];
        }
        if ( isset($_POST['description']) ) {
            $desc = $_POST['description'];
        }
        if ( isset($_POST['tags']) ) {
            $genres = $_POST['tags'];
        }
        $post_time = date("Y-m-d");
        $this->model("Post_model")->addPost($title, $desc, $post_time, $genres);
        $postId = $this->model("Post_model")->getLastPostId();
        $this->model("User_post_model")->addUserPost(1, $postId['post_id']);
        foreach ($fileNamesArray as $finalFile) {
            $fileInfo = pathinfo($finalFile);
            $fileExtension = $fileInfo['extension'];
            $path = $dir.$finalFile;
            
            if (strtolower($fileExtension) === 'mp4') {
                $this->model("Video_model")->addVideo($postId['post_id'], $path);
            } else {
                $this->model("Image_model")->addImage($postId['post_id'], $path);
            }
        }

        // Load Home 
        header("Location: " . BASE_URL . "/home");
        exit;
    }
}