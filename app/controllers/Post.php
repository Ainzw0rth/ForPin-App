<?php

class Post extends Controller {
    public function index() {
        // test
        $currentPost = 1;
        $userId = $this->model('User_post_model')->getUserId($currentPost);
        $data['user'] = $this->model('User_model')->getUserDesc($userId['user_id']);
        $data['post'] = $this->model('Post_model')->getPostElements($currentPost);
        $data['img'] = $this->model('Image_model')->getUserImagePath($currentPost);
        $data['vid'] = $this->model('Video_model')->getUserVideoPath($currentPost);
        $this->view('post/index', $data);
    }
}