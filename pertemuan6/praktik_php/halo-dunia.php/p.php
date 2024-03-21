<?php
$nama = isset($_GET['nama']) ? $_GET['nama'] : 'Tamu';
$usia = isset($_GET['usia']) ? $_GET['usia'] : 'tidak diketahui';

echo "Halo {$nama}! Apakah benar anda berusia {$usia} tahun?";
?>
