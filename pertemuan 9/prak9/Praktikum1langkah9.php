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

// Check if the table already exists
$tableExists = $koneksi->query("SHOW TABLES LIKE 'user'");
if ($tableExists->num_rows == 0) {
    // SQL to create table if it does not exist
    $sql = "CREATE TABLE user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($koneksi->query($sql) === TRUE) {
        echo "Table user created successfully";
    } else {
        echo "Error creating table: " . $koneksi->error;
    }
} else {
    echo "Table 'user' already exists. Cannot create it again.";
}

// Close connection
$koneksi->close();
?>
