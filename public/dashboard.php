<?php
// Start session and check if the user is logged in
session_start();

// Ensure the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../includes/header.php');
include('../includes/navbar.php');

// Include the database connection
include('../includes/dbconnect.php');

// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

// Fetch user details from the database
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Fetch the user's appointments
$appointments_sql = "SELECT * FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC";
$appointments_stmt = $conn->prepare($appointments_sql);
$appointments_stmt->bind_param("i", $user_id);
$appointments_stmt->execute();
$appointments_result = $appointments_stmt->get_result();
?>

<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <p>Here is your personal dashboard where you can view your appointments and manage your profile.</p>

    <!-- User Details Section -->
    <section>
        <h2>Your Profile</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
        <a href="edit-profile.php" class="btn">Edit Profile</a>
    </section>

    <!-- Upcoming Appointments Section -->
    <section>
        <h2>Your Upcoming Appointments</h2>
        <?php if ($appointments_result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($appointment = $appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('F j, Y', strtotime($appointment['appointment_date'])); ?></td>
                            <td><?php echo date('g:i A', strtotime($appointment['appointment_time'])); ?></td>
                            <td><?php echo htmlspecialchars($appointment['doctor']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['department']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no upcoming appointments.</p>
        <?php endif; ?>
    </section>

    <!-- Appointment History Section -->
    <section>
        <h2>Your Appointment History</h2>
        <?php
        // Fetch past appointments
        $past_appointments_sql = "SELECT * FROM appointments WHERE user_id = ? AND appointment_date < NOW() ORDER BY appointment_date DESC";
        $past_appointments_stmt = $conn->prepare($past_appointments_sql);
        $past_appointments_stmt->bind_param("i", $user_id);
        $past_appointments_stmt->execute();
        $past_appointments_result = $past_appointments_stmt->get_result();
        ?>
        <?php if ($past_appointments_result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Department</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($past_appointment = $past_appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('F j, Y', strtotime($past_appointment['appointment_date'])); ?></td>
                            <td><?php echo date('g:i A', strtotime($past_appointment['appointment_time'])); ?></td>
                            <td><?php echo htmlspecialchars($past_appointment['doctor']); ?></td>
                            <td><?php echo htmlspecialchars($past_appointment['department']); ?></td>
                            <td><?php echo htmlspecialchars($past_appointment['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no past appointments.</p>
        <?php endif; ?>
    </section>

    <!-- Book an Appointment Section -->
    <section>
        <h2>Book a New Appointment</h2>
        <p>If you wish to book a new appointment, click the button below to get started.</p>
        <a href="appointments.php" class="btn">Book an Appointment</a>
    </section>
</div>

<?php include('../includes/footer.php'); ?>

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
</style>