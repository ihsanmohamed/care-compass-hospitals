<?php
include('../includes/dbconnect.php');

header('Content-Type: application/json');

// Get services from the database
$sql = "SELECT * FROM services ORDER BY service_name";
$result = $conn->query($sql);

$services = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
    echo json_encode($services);
} else {
    echo json_encode(['message' => 'No services found.']);
}

$conn->close();
?>
