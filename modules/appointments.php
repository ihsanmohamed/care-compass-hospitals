<?php
// appointments.php

// Include the database connection
include('../includes/dbconnect.php');

// Function to fetch upcoming appointments
function getAppointments($user_id) {
    global $conn;
    $sql = "SELECT * FROM appointments WHERE user_id = ? AND appointment_date >= CURDATE()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to book an appointment
function bookAppointment($user_id, $doctor_id, $appointment_date, $reason) {
    global $conn;
    $sql = "INSERT INTO appointments (user_id, doctor_id, appointment_date, reason) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $user_id, $doctor_id, $appointment_date, $reason);
    return $stmt->execute();
}
?>
