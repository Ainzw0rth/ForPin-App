<?php


class User extends Controller {
    public function index() {
        try {
            switch($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->middleware('Token')->generateToken();
                    $this->view('user/index');
                    error_log($_SESSION['csrf_token']);
                    exit;
                    break;
                default:
                    throw new LoggedExceptions('Method Not Allowed', 405);     
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function login() {
        $this->view('user/login');
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

                    break;
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
}