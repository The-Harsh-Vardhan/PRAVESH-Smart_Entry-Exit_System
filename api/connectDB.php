<?php
/* Database connection settings
 * Automatically uses Vercel environment variables when deployed,
 * falls back to local InfinityFree settings for development.
 */
if (getenv('MYSQL_HOST')) {
    // Vercel / Production
    $servername = getenv('MYSQL_HOST');
    $username   = getenv('MYSQL_USER');
    $password   = getenv('MYSQL_PASSWORD');
    $dbname     = getenv('MYSQL_DATABASE');
} else {
    // Local development
    $servername = "sql.infinityfree.com";
    $username   = "epiz_XXXXXXXX";        // Your username from Step 3
    $password   = "YOUR_PASSWORD";         // Your password from Step 3
    $dbname     = "epiz_XXXXXXXX_sensor_db"; // Your database name from Step 3
}

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>