<!-- dbconnect.php -->
<?php
// Query to fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();

?>
