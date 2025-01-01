<?php
header('Content-Type: application/json');
require_once '../config/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

    $stmt = $conn->prepare("SELECT * FROM appointments WHERE user_id = ? AND appointment_date >= CURDATE()");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $appointments = [];
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }

    echo json_encode(['status' => 'success', 'appointments' => $appointments]);
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
