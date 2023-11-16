<?php


class Profile extends Controller {
    public function index($search = "' '") {
        if ( isset($_SESSION['user_id']) ) {
            try {
                $data['search'] = $search;
                $data['base'] = "http://localhost:80/profile/";
                $data['amount'] = $this->model('Post_model')->getAmountFromUserId($_SESSION['user_id']);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $data['is_admin'] = $this->model('User_model')->getIsAdmin($_SESSION['user_id'])['is_admin'];
                if ($search === "' '") {
                    $data['user_id'] = $_SESSION['user_id'];
                    $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                } else {
                    $data['user'] = $this->model('User_model')->getUserDescByUsername($search);
                    $data['user_id'] = $data['user']['user_id'];
                    $data['subscriber'] = $_SESSION['user_id'];
                    $data['premium'] = $this->model('Premium_model')->checkPremium($data['user_id']);
                    $data['subscription_status'] = $this->model('Subscription_model')->checkSubscriptionStatus($data['user_id'], $data['subscriber']);
                }
                $data['posts'] = $this->model('Post_model')->getAllPostFromUserId($search, $data['user_id']);
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
                $data['base'] = "http://localhost:80/profile/edit/";
                $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $data['filename'] = "";
                $data['is_admin'] = $this->model('User_model')->getIsAdmin($_SESSION['user_id'])['is_admin'];
                if ( isset($_POST['submit-profpic']) ) {
                    $uploadDir =  '/var/www/html/public/images/testing_images/';
                    if (!empty($_FILES['file']['name'])) {
                        $fileTempName = $_FILES['file']['tmp_name'];
                        $fileName = $_FILES['file']['name'];
                        $filePath = $uploadDir . $fileName;
                        
                        if ( file_exists($filePath) ) {
                            $fileName = time().$fileName;
                            $filePath = $uploadDir.$fileName;
                            move_uploaded_file($fileTempName, $filePath);
                        } else {
                            move_uploaded_file($fileTempName, $filePath);
                        }
                        $data['user']['profile_path'] = BASE_URL . "/public/images/testing_images/" . $fileName;
                    }
                }
                $this->view('profile/edit', $data);
    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
    public function editUserDesc() {
        if ( isset($_SESSION['user_id']) ) {
            try {
                if ( isset($_POST['user-change-submit']) ) {
                    $this->model('User_model')->editUserProf($_SESSION['user_id'], $_POST['username'], $_POST['fullname'], $_POST['password'], $_POST['email'], $_POST['profile_path']);
                    header("Location: " . BASE_URL . "/profile");
                }
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
    public function delete($user_id = "") {
        if ( isset($_SESSION['user_id']) ) {
            try {
                if ($user_id === "") {
                    $this->model('User_model')->deleteAccount($_SESSION['user_id']);
                    header("Location: " . BASE_URL . "/user/login");
                } else {
                    $this->model('User_model')->deleteAccount($user_id);
                    header("Location: " . BASE_URL . "/settings");
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