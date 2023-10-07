<?php


class Profile extends Controller {
    public function index($search = "' '") {
        if ( isset($_SESSION['user_id']) ) {
            try {
                $data['search'] = $search;
                $data['base'] = "http://localhost:8080/profile/";
                $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                $data['amount'] = $this->model('Post_model')->getAmountFromUserId($_SESSION['user_id']);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $data['posts'] = $this->model('Post_model')->getAllPostFromUserId($search, $_SESSION['user_id']);

                $this->view('profile/index', $data);
    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }

    public function edit() {
        if ( isset($_SESSION['user_id']) ) {
            try {
                $data['base'] = "http://localhost:8080/profile/edit/";
                $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $this->view('profile/edit', $data);
    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
}