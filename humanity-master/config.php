<?php
// Database connection settings
$servername = "localhost"; // or your server name
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "chariti";      // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
