<?php
include('../includes/dbconnect.php');

header('Content-Type: application/json');

// Get appointments from the database
$sql = "SELECT * FROM appointments ORDER BY appointment_date DESC";
$result = $conn->query($sql);

$appointments = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
    echo json_encode($appointments);
} else {
    echo json_encode(['message' => 'No appointments found.']);
}

$conn->close();
?>
