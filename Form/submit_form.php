<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sensor_db";

// Establish a connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is submitted
if (isset($_POST['uid']) && isset($_POST['reason']) && isset($_POST['return_time'])) {
    $uid = $_POST['uid'];
    $reason = $_POST['reason'];
    $return_time = $_POST['return_time'];

    // Update the logs table with the reason and estimated return time
    $stmt = $conn->prepare("UPDATE logs SET reason = ?, return_time_estimate = ? WHERE card_uid = ? AND return_time_estimate IS NULL");
    $stmt->bind_param("sss", $reason, $return_time, $uid);

    if ($stmt->execute()) {
        echo "Form data updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Form data is missing.";
}

$conn->close();
?>
