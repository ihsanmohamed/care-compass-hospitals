<?php
// feedback.php

// Include the database connection
include('../includes/dbconnect.php');

// Function to submit feedback
function submitFeedback($user_id, $rating, $comment) {
    global $conn;
    $sql = "INSERT INTO feedback (user_id, rating, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $rating, $comment);
    return $stmt->execute();
}

// Function to get all feedback
function getFeedback() {
    global $conn;
    $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
