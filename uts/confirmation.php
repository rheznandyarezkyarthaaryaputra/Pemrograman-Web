<?php
// confirmation.php
session_start();
if (isset($_SESSION['movie']) && isset($_SESSION['tickets'])) {
    echo "<h1>Konfirmasi Pembelian</h1>";
    echo "<p>Film: " . $_SESSION['movie'] . "</p>";
    echo "<p>Jumlah Tiket: " . $_SESSION['tickets'] . "</p>";
} else {
    echo "<p>Data tidak ditemukan. Kembali ke form pembelian.</p>";
}
?>
