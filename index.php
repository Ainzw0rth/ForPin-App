<?php

require_once 'app/init.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$app = new App;