<?php
// user-management.php

// Include the database connection
include('../includes/dbconnect.php');

// Function to register a new user
function registerUser($name, $email, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);
    return $stmt->execute();
}

// Function to authenticate user during login
function authenticateUser($email, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user; // Login successful
        }
    }
    return false; // Login failed
}
?>
