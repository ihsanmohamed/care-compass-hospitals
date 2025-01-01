<?php
require_once '../config/dbconnect.php';

// Function to save user feedback
function saveFeedback($name, $email, $message) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    return $stmt->execute();
}

// Function to get all feedback
function getFeedback() {
    global $conn;
    $sql = "SELECT * FROM feedback";
    return $conn->query($sql);
}
?>
