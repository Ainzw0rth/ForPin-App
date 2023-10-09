<?php

require_once 'app/init.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if (session_status() == PHP_SESSION_ACTIVE) {
//     session_unset();
//     session_destroy();
// }

$app = new App;