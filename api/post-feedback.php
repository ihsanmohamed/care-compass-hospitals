<?php
include('../includes/dbconnect.php');

header('Content-Type: application/json');

// Check if feedback is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $date = date('Y-m-d H:i:s');

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (patient_id, rating, comments, created_at) 
            VALUES ('$patient_id', '$rating', '$comments', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Feedback submitted successfully.']);
    } else {
        echo json_encode(['message' => 'Error submitting feedback: ' . $conn->error]);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}

$conn->close();
?>
