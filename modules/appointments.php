<?php
require_once '../config/dbconnect.php';

// Function to get all appointments
function getAppointments() {
    global $conn;
    
    // Using try-catch block for better error handling
    try {
        $sql = "SELECT * FROM appointments";
        $result = $conn->query($sql);
        
        if (!$result) {
            throw new Exception("Error retrieving appointments: " . $conn->error);
        }
        
        return $result;
    } catch (Exception $e) {
        // Log error and return false
        error_log($e->getMessage());
        return false;
    }
}

// Function to create a new appointment
function createAppointment($patient_name, $doctor_name, $appointment_date, $reason) {
    global $conn;
    
    // Input sanitization: prevent SQL injection and ensure safe input
    $patient_name = htmlspecialchars($patient_name);
    $doctor_name = htmlspecialchars($doctor_name);
    $appointment_date = htmlspecialchars($appointment_date);
    $reason = htmlspecialchars($reason);

    // Using try-catch block for better error handling
    try {
        $stmt = $conn->prepare("INSERT INTO appointments (patient_name, doctor_name, appointment_date, reason) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            throw new Exception("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("ssss", $patient_name, $doctor_name, $appointment_date, $reason);

        // Execute the statement and check if successful
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Log error and return false
        error_log($e->getMessage());
        return false;
    }
}

// Function to update an existing appointment
function updateAppointment($appointment_id, $patient_name, $doctor_name, $appointment_date, $reason) {
    global $conn;

    // Input sanitization
    $patient_name = htmlspecialchars($patient_name);
    $doctor_name = htmlspecialchars($doctor_name);
    $appointment_date = htmlspecialchars($appointment_date);
    $reason = htmlspecialchars($reason);

    // Using try-catch block for better error handling
    try {
        $stmt = $conn->prepare("UPDATE appointments SET patient_name = ?, doctor_name = ?, appointment_date = ?, reason = ? WHERE appointment_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("ssssi", $patient_name, $doctor_name, $appointment_date, $reason, $appointment_id);

        // Execute the statement and check if successful
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Log error and return false
        error_log($e->getMessage());
        return false;
    }
}

// Function to delete an appointment
function deleteAppointment($appointment_id) {
    global $conn;

    // Using try-catch block for better error handling
    try {
        $stmt = $conn->prepare("DELETE FROM appointments WHERE appointment_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("i", $appointment_id);

        // Execute the statement and check if successful
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Log error and return false
        error_log($e->getMessage());
        return false;
    }
}

// Function to get an appointment by its ID
function getAppointmentById($appointment_id) {
    global $conn;

    // Input sanitization to prevent SQL injection
    $appointment_id = (int)$appointment_id; // Ensure it's an integer

    // Using try-catch block for better error handling
    try {
        $stmt = $conn->prepare("SELECT * FROM appointments WHERE appointment_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("i", $appointment_id); // Bind the appointment_id parameter

        // Execute the statement
        if ($stmt->execute()) {
            $result = $stmt->get_result(); // Get the result of the query
            if ($result->num_rows > 0) {
                return $result->fetch_assoc(); // Return the appointment as an associative array
            } else {
                throw new Exception("No appointment found with ID: $appointment_id");
            }
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Log error and return false
        error_log($e->getMessage());
        return false;
    }
}

?>