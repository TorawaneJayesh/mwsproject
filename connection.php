<?php
$host = "localhost"; // Your host name
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "mwsdatabase"; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>