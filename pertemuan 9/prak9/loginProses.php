<?php
include "koneksi.php";

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Gunakan prepared statements untuk menghindari SQL injection
$query = "SELECT * FROM user WHERE username = ?";

// Siapkan query
$stmt = mysqli_prepare($connect, $query);

// Ikatan parameter (s untuk string)
mysqli_stmt_bind_param($stmt, 's', $username);

// Eksekusi statement
mysqli_stmt_execute($stmt);

// Dapatkan hasilnya
$result = mysqli_stmt_get_result($stmt);

// Verifikasi password
if ($user = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $user['password'])) {
        // Password cocok, redirect ke homeAdmin.html
        header('Location: homeAdmin.html');
        exit();
    } else {
        // Password tidak cocok
        echo "Anda gagal login. silahkan ";
        ?>
        <a href="loginForm.html">Login kembali</a>
        <?php
    }
} else {
    // Username tidak ditemukan
    echo "Anda gagal login. silahkan ";
    ?>
    <a href="loginForm.html">Login kembali</a>
    <?php
}

// Tutup statement
mysqli_stmt_close($stmt);
?>
