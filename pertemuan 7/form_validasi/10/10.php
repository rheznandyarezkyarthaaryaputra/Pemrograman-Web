<?php
// ... Kode PHP lainnya ...

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = []; // Array untuk menyimpan pesan kesalahan

if (empty($nama)) {
    $errors['nama'] = "Nama harus diisi.";
}

if (empty($email)) {
    $errors['email'] = "Email harus diisi.";
}

if (strlen($password) < 8) {
    $errors['password'] = "Password harus minimal 8 karakter.";
}

// Cek jika ada error
if (count($errors) > 0) {
    // Handle jika ada error, misal kirim balik ke form dengan JSON
    echo json_encode($errors);
} else {
    // Proses data karena tidak ada error
    // ...
    echo "Data berhasil diproses.";
}

// ... Kode PHP lainnya ...
?>
