<?php
// Skor yang dikumpulkan pemain
$poinPemain = 550; // Misalnya, pemain memiliki 550 poin

// Tampilan baris pertama
echo "Total skor pemain adalah: " . $poinPemain . "<br>";

// Operator ternary untuk menentukan apakah pemain mendapatkan hadiah tambahan
$hadiahTambahan = ($poinPemain > 500) ? "YA" : "TIDAK";

// Tampilan baris kedua
echo "Apakah pemain mendapatkan hadiah tambahan? " . $hadiahTambahan;
?>
