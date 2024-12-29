<?php
// Start session and check if the user is logged in as admin
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

include('../includes/header.php');

// Database connection
include('../includes/dbconnect.php');

// Fetch appointments and users
$appointments_query = "SELECT * FROM appointments ORDER BY appointment_date DESC";
$appointments_result = mysqli_query($conn, $appointments_query);

$users_query = "SELECT * FROM users ORDER BY name ASC";
$users_result = mysqli_query($conn, $users_query);
?>

<div class="container">
    <h1>Admin Panel</h1>
    <p>Welcome, Admin! You can manage appointments and users here.</p>

    <!-- Manage Appointments Section -->
    <section>
        <h2>Manage Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Appointment Date</th>
                    <th>Doctor</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($appointment = mysqli_fetch_assoc($appointments_result)): ?>
                    <tr>
                        <td><?php echo $appointment['patient_name']; ?></td>
                        <td><?php echo date('F j, Y, g:i a', strtotime($appointment['appointment_date'])); ?></td>
                        <td><?php echo $appointment['doctor']; ?></td>
                        <td><?php echo $appointment['status']; ?></td>
                        <td>
                            <a href="edit-appointment.php?id=<?php echo $appointment['id']; ?>" class="btn">Edit</a>
                            <a href="delete-appointment.php?id=<?php echo $appointment['id']; ?>" class="btn">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <!-- Manage Users Section -->
    <section>
        <h2>Manage Users</h2>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($users_result)): ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td>
                            <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="btn">Edit</a>
                            <a href="delete-user.php?id=<?php echo $user['id']; ?>" class="btn">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
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