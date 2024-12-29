<?php
// services.php

// Include the database connection
include('../includes/dbconnect.php');

// Function to fetch all services
function getServices() {
    global $conn;
    $sql = "SELECT * FROM services ORDER BY name";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
