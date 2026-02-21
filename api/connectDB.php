<?php
/* Database connection settings */
$servername = "sql.infinityfree.com";
$username = "epiz_XXXXXXXX";        // Your username from Step 3
$password = "YOUR_PASSWORD";         // Your password from Step 3
$dbname = "epiz_XXXXXXXX_sensor_db"; // Your database name from Step 3

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>