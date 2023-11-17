<?php


class Settings extends Controller {
    public function index() {
        if ( isset($_SESSION['user_id']) ) {
            try {
                $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $data['users'] = $this->model('User_model')->getUserListDesc();
                $data['is_admin'] = $this->model('User_model')->getIsAdmin($_SESSION['user_id'])['is_admin'];
                $data['creator_username_upgrade'] =  $this->model('User_model')->getUsernameById($_SESSION['user_id'])['username'];
                $data['premium_desc'] = $this->model('Premium_model')->getPremiumDesc($data['creator_username_upgrade']);
                if ($data['is_admin']) {
                    $this->view('settings/index', $data);
                } else {
                    throw new LoggedExceptions('Forbidden', 403);
                }
    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
}