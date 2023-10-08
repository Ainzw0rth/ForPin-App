<?php

class LoggedExceptions extends Exception {

    public function __construct($message= "",  $code= 0) {
        parent::__construct($message, $code);
        $this->logError($message, $code);
    }

    public function logError($message, $code) {
        require_once 'app/controllers/Exceptionerror.php';
        $controller = new Exceptionerror();
        $data['error'] = $code;
        $controller->view('exceptionerror/index', $data);
        // error_log('ERROR' . $code . ': ' . $message);
    }
}