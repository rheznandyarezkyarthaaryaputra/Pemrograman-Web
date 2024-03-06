<?php
// Harga produk sebelum diskon
$hargaProduk = 120000;

// Diskon yang diberikan untuk pembelian di atas Rp 100.000
$diskon = 0.20; // 20% diskon

// Harga yang harus dibayar
$hargaBayar = $hargaProduk;

// Cek jika harga produk lebih dari Rp 100.000 untuk diskon
if ($hargaProduk > 100000) {
    // Hitung besar diskon
    $besarDiskon = $hargaProduk * $diskon;
    // Hitung harga setelah diskon
    $hargaBayar -= $besarDiskon;
}

// Mencetak hasil
echo "Harga produk: Rp " . number_format($hargaProduk, 2, ',', '.') . "<br>";
echo "Diskon: " . ($diskon * 100) . "%<br>";
echo "Besar diskon: Rp " . number_format($besarDiskon, 2, ',', '.') . "<br>";
echo "Harga yang harus dibayar: Rp " . number_format($hargaBayar, 2, ',', '.');
?>
