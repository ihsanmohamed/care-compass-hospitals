<?php
require_once '../config/dbconnect.php';

// Function to fetch all users
function fetchUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    return $conn->query($sql);
}

// Function to fetch a user by ID
function fetchUserById($user_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    return null;  // Return null if query fails
}

// Function to add a new user (e.g., admin, staff)
function addUser($username, $password, $role) {
    global $conn;
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Username already exists.";  // Return error message if user exists
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $role);
    if ($stmt->execute()) {
        return true;  // Return true on successful insert
    }
    return false;  // Return false if insertion fails
}

// Function to update user details
function updateUser($user_id, $username, $password, $role) {
    global $conn;
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND user_id != ?");
    $stmt->bind_param("si", $username, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Username already exists.";  // Return error message if username exists
    }

    // Update user information
    $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, role = ? WHERE user_id = ?");
    $stmt->bind_param("sssi", $username, $hashed_password, $role, $user_id);
    if ($stmt->execute()) {
        return true;  // Return true on successful update
    }
    return false;  // Return false if update fails
}

// Function to delete a user
function deleteUser($user_id) {
    global $conn;

    // Check if user exists before deletion
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Proceed to delete user
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            return true;  // Return true on successful deletion
        }
    }
    return false;  // Return false if user not found or deletion fails
}
?>
