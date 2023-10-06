<?php

define('DB_HOST', $_ENV['POSTGRES_HOSTNAME']);
define('DB_USER', $_ENV['POSTGRES_USER']);
define('DB_PASS', $_ENV['POSTGRES_PASSWORD']);
define('DB_NAME', $_ENV['POSTGRES_DB']);
define('DB_PORT', $_ENV['POSTGRES_PORT']);

// Base URL  
define('BASE_URL', 'http://localhost:8080');

// Debounce
define('DEBOUNCE_TIMEOUT', 600);