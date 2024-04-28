<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prakwebdb";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
echo "Connected successfully\n";

// Prepare data
$userName = 'new_user'; // Replace 'new_user' with the desired username
$userPassword = 'user_password'; // Replace 'user_password' with the desired password

// SQL to insert a new record
$sql = "INSERT INTO user (username, password) VALUES ('$userName', '$userPassword')";

if (mysqli_query($koneksi, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Close connection
$koneksi->close();
?>
