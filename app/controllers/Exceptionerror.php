<?php


class Exceptionerror extends Controller {
    public function index($error_code = "404") {
        try {
            $data['error'] = $error_code;
            $data['base'] = "http://localhost:80/exceptionerror/";

            $this->view('exceptionerror/index', $data);

        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
    
}