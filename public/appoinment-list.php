
<?php
// Include required files
require_once '../modules/appointments.php';  // Your function for fetching appointments
include '../includes/navbar.php';  // Navigation bar

// Get the list of appointments from the database
$appointments = getAppointments(); // Ensure this function works properly and returns a valid result

// Handle Delete Appointment Request
if (isset($_GET['delete_id'])) {
    $appointment_id = $_GET['delete_id'];
    deleteAppointment($appointment_id);  // Function to delete an appointment from the database
    header("Location: appointments.php");  // Redirect to the appointments page
    exit();
}

// Handle Edit Appointment Request (when form is submitted)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    updateAppointment($appointment_id, $patient_name, $doctor_name, $appointment_date, $reason);  // Update the appointment in the database
    header("Location: appointments.php");  // Redirect to the appointments page
    exit();
}

?>

<!-- Main content -->
<div class="container my-5">
    <h1 class="text-center text-primary mb-4">Appointments</h1>

    <!-- Scheduled Appointments Section -->
    <h2 class="mb-4">Scheduled Appointments</h2>
    
    <?php if ($appointments && $appointments->num_rows > 0): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <!-- Table for appointments -->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Appointment ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($appointment = $appointments->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $appointment['appointment_id']; ?></td>
                                <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                                <td><?php echo $appointment['appointment_date']; ?></td>
                                <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['reason']); ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="appointments.php?edit_id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    
                                    <!-- Delete Button -->
                                    <a href="appointments.php?delete_id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            No appointments scheduled yet.
        </div>
    <?php endif; ?>

    <!-- Book a New Appointment Section -->
    <h2 class="mt-4">Book a New Appointment</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="book-appointment.php" method="POST">
                <div class="mb-3">
                    <label for="patient_name" class="form-label">Your Name:</label>
                    <input type="text" id="patient_name" name="patient_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="doctor_name" class="form-label">Doctor Name:</label>
                    <input type="text" id="doctor_name" name="doctor_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="appointment_date" class="form-label">Appointment Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="reason" class="form-label">Reason for Appointment:</label>
                    <textarea id="reason" name="reason" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100">Book Appointment</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    // Edit Appointment Section
    if (isset($_GET['edit_id'])) {
        $appointment_id = $_GET['edit_id'];
        $appointment = getAppointmentById($appointment_id);  // Function to get appointment by ID
        
        if ($appointment): ?>
            <h2 class="mt-4">Edit Appointment</h2>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="appointments.php" method="POST">
                        <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                        <div class="mb-3">
                            <label for="patient_name" class="form-label">Patient Name:</label>
                            <input type="text" id="patient_name" name="patient_name" class="form-control" value="<?php echo htmlspecialchars($appointment['patient_name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctor_name" class="form-label">Doctor Name:</label>
                            <input type="text" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo htmlspecialchars($appointment['doctor_name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="appointment_date" class="form-label">Appointment Date:</label>
                            <input type="date" id="appointment_date" name="appointment_date" class="form-control" value="<?php echo $appointment['appointment_date']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason:</label>
                            <textarea id="reason" name="reason" class="form-control" required><?php echo htmlspecialchars($appointment['reason']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="edit_appointment" class="btn btn-warning w-100">Update Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif;
    }
    ?>
</div>

<?php include('../includes/footer.php'); ?>

<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Ensures the footer is always at the bottom of the page */
    html, body {
        height: 100%;
    }
    .container {
        min-height: 80vh; /* Ensures content takes up at least 80% of the height */
    }
    footer {
        position: relative;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
    }

    /* Styling for table rows */
    .table th, .table td {
        vertical-align: middle;
    }

    .alert {
        border-radius: 10px;
    }

    .card-body {
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        padding: 12px 15px;
        border-radius: 10px 10px 0 0;
    }
</style>
