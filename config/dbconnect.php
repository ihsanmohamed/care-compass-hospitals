<?php
// Include the configuration file for the database connection
include('../config/config.php');

// Create a connection to the database using the mysqli class
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character encoding to UTF-8 for consistent character handling
$conn->set_charset("utf8");

// Optionally, you can test the connection:
echo "Connected successfully to the database";
?>
