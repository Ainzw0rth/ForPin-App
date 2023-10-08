<?php

class App {
    protected $controller = 'User';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // controller 
        if ( !empty($url) ) {
            if ( file_exists('app/controllers/' . $url[0] . '.php') ) {
                $this->controller = $url[0];
                unset($url[0]);
                require_once 'app/controllers/' . $this->controller . '.php';
                $this->controller = new $this->controller;
        
                // method
                if ( isset($url[1]) ) {
                    if ( method_exists($this->controller, $url[1]) ) {
                        $this->method = $url[1];
                        unset($url[1]);
                    }
                }
        
                // params 
                if ( !empty($url) ) {
                    $this->params = array_values($url);
                }
                call_user_func_array([$this->controller, $this->method], $this->params);
            } else {
                require_once 'app/controllers/Exceptionerror.php';
                $this->controller = new Exceptionerror();
                $this->method = 'index';
                call_user_func_array([$this->controller, $this->method], $this->params);
            }
        } else {
            require_once 'app/controllers/User.php';
            $this->controller = new User();
            call_user_func_array([$this->controller, "index"], $this->params);
        }
        

        // run the controller and method and send the params 
   

    }   

    public function parseURL() {
        if ( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}