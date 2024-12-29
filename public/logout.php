<?php
// Start the session
session_start();

// Destroy all session data
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to the homepage (index.php)
header("Location: index.php"); // Redirect to index.php
exit();
?>