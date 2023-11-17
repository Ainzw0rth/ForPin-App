<?php


class User extends Controller {
    public function index() {
        try {
            switch($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->middleware('Token')->generateToken();
                    $this->view('user/index');
                    $this->model('User_model');
                    exit;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);     
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function login() {
        try {
            switch($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->middleware("Token")->generateToken();
                    $this->view('user/login');
                    exit;
                case 'POST':
                    $this->middleware('Token')->checkToken($_POST['csrf_token']);
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $userId = $this->model('User_model')->login($username, $password);
                    $_SESSION['user_id'] = $userId;
                    header('Content-Type: application/json');
                    http_response_code(201);
                    echo json_encode(["redirect_url" => BASE_URL . '/home']);
                    exit;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function signup() {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $this->middleware('Token')->checkToken($_POST['csrf_token']);
                    $this->model('User_model')->signup($_POST['email'], $_POST['username'], $_POST['fullname'], $_POST['password']);
                    
                    header('Content-Type: application/json');
                    http_response_code(201);
                    echo json_encode(["redirect_url" => BASE_URL . "/user/login"]);

                    exit;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
            exit;
        }
    }

    public function logout() {
        try {
            switch($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $token = $_POST['csrf_token'];
                    $this->middleware("Token")->checkToken($token);
                    
                    unset($_SESSION['user_id']);
                    session_destroy();
                    header('Content-Type: application/json');
                    http_response_code(201);
                    echo json_encode(["redirect_url" => BASE_URL . "/user/login"]);

            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
            exit;
        }
    }

    public function email($emailReq, $token) {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->middleware("Token")->checkToken($token);
                    
                    $email = $this->model("User_model")->isEmailAlreadyTaken($emailReq);
                    if (!$email) {
                        throw new LoggedExceptions("Not Found", 404);
                    } 
                    http_response_code(200);
                    exit;
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
            exit;
        }
    }

    public function username($username, $token) {
        try {
            switch($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->middleware("Token")->checkToken($token);
                    $username = $this->model("User_model")->isUserAlreadyTaken($username);
                    
                    if (!$username) {
                        throw new LoggedExceptions("Not Found", 404);
                    }

                    http_response_code(200);

                    exit;
                default:
                    throw new LoggedExceptions("Method Not Allowed", 405);
            }   
        } catch (Exception $e) {
            http_response_code($e->getCode());
            exit;
        }
    }

    public function getUser($userid) {
        try {
            switch($_SERVER['REQUEST_METHOD']) {
                   
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
            exit;
        }
    }
}