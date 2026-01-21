<?php
/**
 * Vercel Production Database Connection
 * This file is used when deploying to Vercel.
 * It reads database credentials from environment variables.
 * 
 * Environment Variables Required:
 * - MYSQL_HOST: Database host URL
 * - MYSQL_USER: Database username
 * - MYSQL_PASSWORD: Database password
 * - MYSQL_DATABASE: Database name
 */

// Check if we're on Vercel (environment variables are set)
$isVercel = getenv('MYSQL_HOST') !== false;

if ($isVercel) {
    // Production: Use environment variables
    $servername = getenv('MYSQL_HOST');
    $username = getenv('MYSQL_USER');
    $password = getenv('MYSQL_PASSWORD');
    $dbname = getenv('MYSQL_DATABASE');
} else {
    // Local development: Use default values
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sensor_db";
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>
