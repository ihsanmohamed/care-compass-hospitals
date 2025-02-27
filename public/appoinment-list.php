<?php
// Include required files
require_once '../modules/appointments.php';  // Your function for fetching appointments
include '../includes/navbar.php';  // Navigation bar

// Get the list of appointments from the database
$appointments = getAppointments(); // Ensure this function works properly and returns a valid result

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

    <!-- Button to show booking form -->
    <div class="text-center mt-4">
        <button id="showFormButton" class="btn btn-success">Book Appointment</button>
    </div>

    <!-- Booking Form (initially hidden) -->
    <div id="bookingForm" class="card shadow-sm mt-4" style="display: none;">
        <div class="card-body">
            <h3 class="text-center text-primary mb-4">Book a New Appointment</h3>
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
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript to toggle the booking form -->
<script>
    document.getElementById('showFormButton').addEventListener('click', function () {
        const form = document.getElementById('bookingForm');
        if (form.style.display === 'none') {
            form.style.display = 'block';
            this.innerText = 'Hide Booking Form';
        } else {
            form.style.display = 'none';
            this.innerText = 'Book Appointment';
        }
    });
</script>

<style>
    .alert {
        border-radius: 10px;
    }
    .card-body {
        background-color: #f9f9f9;
        border-radius: 10px;
    }
</style>
<?php include('../includes/footer.php'); ?>

<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Flexbox setup for footer at bottom */
    html, body {
        height: 100%; /* Make the body take the full height */
        margin: 0; /* Remove default margins */
        display: flex; /* Use Flexbox */
        flex-direction: column; /* Stack elements vertically */
    }

    .container {
        flex: 1; /* Make the container take the remaining space */
    }

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
        position: relative; /* Ensure it's part of the flex layout */
        bottom: 0;
        width: 100%;
    }

    /* Additional styling for content */
    .card-body {
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .alert {
        border-radius: 10px;
    }
</style>