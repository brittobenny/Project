<?php
$host = "localhost";        // or 127.0.0.1
$username = "root";         // default for WAMP
$password = "";             // leave blank unless you've set a root password
$database = "project";    // your database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
