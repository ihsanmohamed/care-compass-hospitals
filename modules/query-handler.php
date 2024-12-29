<?php
// query-handler.php

// Include the database connection
include('../includes/dbconnect.php');

// Function to submit user queries
function submitQuery($name, $email, $message) {
    global $conn;
    $sql = "INSERT INTO user_queries (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    return $stmt->execute();
}
?>
