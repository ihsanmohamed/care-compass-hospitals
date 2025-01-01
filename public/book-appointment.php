<?php
require_once '../modules/appointments.php';  // Include appointment handling module

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $patient_name = htmlspecialchars($_POST['patient_name']);
    $doctor_name = htmlspecialchars($_POST['doctor_name']);
    $appointment_date = $_POST['appointment_date'];
    $reason = htmlspecialchars($_POST['reason']);

    // Call the function to create the appointment
    if (createAppointment($patient_name, $doctor_name, $appointment_date, $reason)) {  // Correct function name here
        // Redirect to appointments page with a success message
        header("Location: appointment-list.php");
        exit;
    } else {
        // Redirect back to the form with an error message
        header("Location: appointment-list.php");
        exit;
    }
}
?>
<?php
// Get appointment ID from URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $appointment_id = (int)$_GET['id'];

    // Call the function to delete the appointment
    if (deleteAppointment($appointment_id)) {
        // Redirect to appointments list page with a success message
        header("Location: appointment-list.php");
        exit;
    } else {
        echo "<p>Error deleting appointment.</p>";
    }
} else {
    echo "<p>Invalid appointment ID.</p>";
}
?>
