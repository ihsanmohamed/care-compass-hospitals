<?php
// Generic function to execute SQL queries
require_once '../config/dbconnect.php';

function executeQuery($sql) {
    global $conn;
    return $conn->query($sql);
}

// Function for querying and returning a single result
function fetchSingleResult($sql) {
    global $conn;
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
?>
