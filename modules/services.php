<?php
require_once '../config/dbconnect.php';

// Function to get all services
function getServices() {
    global $conn;
    $sql = "SELECT * FROM services";
    return $conn->query($sql);
}

// Function to add a new service
function addService($name, $description) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO services (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);
    return $stmt->execute();
}

// Function to update an existing service
function updateService($service_id, $name, $description) {
    global $conn;
    $stmt = $conn->prepare("UPDATE services SET name = ?, description = ? WHERE service_id = ?");
    $stmt->bind_param("ssi", $name, $description, $service_id);
    return $stmt->execute();
}

// Function to delete a service
function deleteService($service_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM services WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);
    return $stmt->execute();
}
?>
