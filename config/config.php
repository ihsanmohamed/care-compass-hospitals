<?php
// config.php

// Database configuration
define('DB_HOST', 'localhost');         // Database host
define('DB_USER', 'root');              // Database username
define('DB_PASS', '');                  // Database password
define('DB_NAME', 'care_compass_db');   // Database name

// Set timezone
date_default_timezone_set('America/New_York');

// Application environment
define('ENVIRONMENT', 'development');  // Set to 'production' in production environment

// Error reporting for development
if (ENVIRONMENT == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0); // Suppress errors in production
    ini_set('display_errors', 0);
}
?>
