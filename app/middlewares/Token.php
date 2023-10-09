<?php

class Token {

    public function generateToken() {
        if ( !isset($_SESSION['csrf_token']) ) {
            $_SESSION['csrf_token'] = md5(uniqid(mt_rand(), true));
        }
    }

    public function checkToken($token) {

        if ( !$token || $token !== $_SESSION['csrf_token'] ) {
            throw new LoggedExceptions('Method Not Allowed', 405);
        }
    }
}