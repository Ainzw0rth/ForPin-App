<?php

class Post extends Controller {
    public function index($currentPost = 1) {

        if ( isset($_SESSION['user_id']) ) {
            try {
                switch ($_SERVER['REQUEST_METHOD']) {
                    case 'GET':
                        $userId = $this->model('User_post_model')->getUserId($currentPost);
                        $data['post_id'] = $currentPost;
                        $data['post_user_id'] = $userId['user_id'];
                        $data['user_id'] = $_SESSION['user_id'];
                        $data['current'] = $currentPost; 
                        $data['user'] = $this->model('User_model')->getUserDesc($userId['user_id']);
                        $data['post'] = $this->model('Post_model')->getPostElements($currentPost);
                        $data['category'] = $this->model('Post_model')->getAllCategories();
                        $data['img'] = $this->model('Image_model')->getUserImagePath($currentPost);
                        $data['vid'] = $this->model('Video_model')->getUserVideoPath($currentPost);
                        $data['is_admin'] = $this->model('User_model')->getIsAdmin($_SESSION['user_id'])['is_admin'];
                        $this->view('post/index', $data);
                        exit;
                    default:
                        throw new LoggedExceptions('Method Not Allowed', 405);
                }
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }    

    public function addLikes() {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    if (isset($_POST['action']) && isset($_POST['postId'])) {
                        $action = $_POST['action'];
                        $postId = $_POST['postId'];
                    
                        if ($action === "add") {
                            $this->model("Post_model")->addLikes($postId);
                        } else {
                            $this->model("Post_model")->substractLikes($postId);
                        }
                    
                        header('Content-Type: application/json'); 
                        echo json_encode($this->model("Post_model")->getLikes($postId));
                    }
                    exit;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function delete($postId) {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->model('Post_model')->deletePost($postId);
                    header("Location: " . BASE_URL . "/home");
                    exit;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function edit() {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $postId = $_POST['post_id']; 
                    $title = $_POST['title']; 
                    $desc = $_POST['description']; 
                    $tags = $_POST['tags'];
                    $this->model('Post_model')->editPost($postId, $title, $desc, $tags);
                    header('Content-Type: application/json');
                    http_response_code(201);
                    echo json_encode(["redirect_url" => BASE_URL . "/post/" . $postId]);
                    exit;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
}