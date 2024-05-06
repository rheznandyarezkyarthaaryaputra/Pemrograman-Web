<?php
// Start the session and check user login
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once '../config/koneksi.php';
require_once '../fungsi/pesan_kilat.php';

// Handle form submission
if (!empty($_POST)) {
    // Sanitize and validate inputs
    $userId = isset($_POST['id']) ? mysqli_real_escape_string($koneksi, $_POST['id']) : '';
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
    $jabatan = isset($_POST['jabatan']) ? mysqli_real_escape_string($koneksi, $_POST['jabatan']) : '';
    $jenisKelamin = isset($_POST['jenis_kelamin']) ? mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']) : '';
    $alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($koneksi, $_POST['alamat']) : '';
    $noTelp = isset($_POST['no_telp']) ? mysqli_real_escape_string($koneksi, $_POST['no_telp']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($koneksi, $_POST['username']) : '';

    // Debug: Output the jenis_kelamin value
    echo "jenis_kelamin: " . $jenisKelamin . "<br>";

    // Prepare SQL statements
    $updateAnggota = "UPDATE anggota SET nama = '$nama', jabatan_id = '$jabatan', jenis_kelamin = '$jenisKelamin', 
        alamat = '$alamat', no_telp = '$noTelp' WHERE user_id = '$userId'";

    // Handle password update
    if (!empty($_POST['password'])) {
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $salt = bin2hex(random_bytes(16)); // Generate a new salt
        $combinedPassword = $salt . $password;
        $hashedPassword = password_hash($combinedPassword, PASSWORD_BCRYPT);

        $updateUser = "UPDATE user SET username = '$username', password = '$hashedPassword', salt = '$salt' 
            WHERE id = '$userId'";
    } else {
        $updateUser = "UPDATE user SET username = '$username' WHERE id = '$userId'";
    }

    // Execute updates
    if (mysqli_query($koneksi, $updateAnggota) && mysqli_query($koneksi, $updateUser)) {
        pesan('success', 'Data Anggota Telah Diubah.');
    } else {
        pesan('danger', 'Gagal Mengubah Data Anggota: ' . mysqli_error($koneksi));
    }
} else {
    pesan('danger', 'Invalid Request');
}

// Redirect to index page
header('Location: ../index.php?page=anggota');
exit;
?>
