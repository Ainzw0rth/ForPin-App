<?php


class Profile extends Controller {
    public function index() {
        if ( isset($_SESSION['user_id']) ) {
            try {

                $this->view('profile/index');
    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
}