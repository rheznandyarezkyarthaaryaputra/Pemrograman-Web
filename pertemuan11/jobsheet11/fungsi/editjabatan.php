<?php
// Dapatkan data dari form
$id = $_POST['id'];
$jabatan = $_POST['jabatan'];
$keterangan = $_POST['keterangan'];

// Koneksi database
require 'koneksi.php';

// Query update data
$query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil di-update";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
