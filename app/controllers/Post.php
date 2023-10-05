<?php

class Post extends Controller {
    public function index($currentPost = 1) {
        // test
        $userId = $this->model('User_post_model')->getUserId($currentPost);
        $data['current'] = $currentPost; 
        $data['user'] = $this->model('User_model')->getUserDesc($userId['user_id']);
        $data['post'] = $this->model('Post_model')->getPostElements($currentPost);
        $data['img'] = $this->model('Image_model')->getUserImagePath($currentPost);
        $data['vid'] = $this->model('Video_model')->getUserVideoPath($currentPost);
        $this->view('post/index', $data);
    }    
    public function carousel() {
        $this->view('post/carousel');
    }    

    public function addLikes() {
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
        } else {
            echo json_encode("Invalid Request");
        }
    }

    public function test($tes) {
        echo $tes;
    }
}