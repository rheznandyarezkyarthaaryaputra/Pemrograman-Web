<?php
session_start();
require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGenerator;

// Fungsi untuk validasi dan sanitasi input
function validateInput($data, $type) {
    switch ($type) {
        case 'string':
            $data = strip_tags($data); // Menghilangkan tag HTML dan PHP
            $data = trim($data); // Menghapus spasi di awal dan di akhir string
            $data = stripslashes($data); // Menghapus backslashes
            break;
        case 'integer':
            $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT); // Memastikan data adalah integer
            break;
    }
    return $data;
}

$movie = validateInput($_POST['movie'] ?? '', 'string');
$tickets = validateInput($_POST['tickets'] ?? '', 'integer');

if (!empty($movie) && !empty($tickets) && $tickets > 0) {
    setcookie('selectedMovie', $movie, time() + 3600, '/');
    setcookie('selectedTickets', $tickets, time() + 3600, '/');

    $_SESSION['movie'] = $movie;
    $_SESSION['tickets'] = $tickets;

    // Membuat barcode
    $generator = new BarcodeGeneratorPNG();
    $barcode = $generator->getBarcode($movie . "_" . $tickets, BarcodeGenerator::TYPE_CODE_128);
    $barcodeData = base64_encode($barcode);

    // Menampilkan informasi dan barcode
    echo "Anda telah berhasil memesan " . $tickets . " tiket untuk menonton film " . $movie . ".";
    echo "<div><img src='pentol.jpeg'," . $barcodeData . "' alt='Barcode Image'></div>";
} else {
    echo "Invalid Request. Please provide a valid movie and ticket quantity.";
}
?>
