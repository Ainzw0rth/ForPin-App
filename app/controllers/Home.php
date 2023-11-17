<?php


class Home extends Controller {
    public function index($search = "' '") {
        if ( isset($_SESSION['user_id']) ) {
            try {
                $data['search'] = $search;
                $data['base'] = "http://localhost:80/home/";
                $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                $data['amount'] = $this->model('Post_model')->getAmount($search);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $data['posts'] = $this->model('Post_model')->getAll($search);
                $data['is_admin'] = $this->model('User_model')->getIsAdmin($_SESSION['user_id'])['is_admin'];
                $data['creator_username_upgrade'] =  $this->model('User_model')->getUsernameById($_SESSION['user_id'])['username'];
                $data['premium_desc'] = $this->model('Premium_model')->getPremiumDesc($data['creator_username_upgrade']);
                $this->view('home/index', $data);    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
}