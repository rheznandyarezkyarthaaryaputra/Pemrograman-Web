
<?php
date_default_timezone_set("Asia/Jakarta");

// Database connection parameters
$hostname = "localhost"; // Change to your hostname
$username = "root"; // Change to your username
$password = ""; // Change to your password
$database = "prakwebdb"; // Change to your database name

// Create connection
$koneksi = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
