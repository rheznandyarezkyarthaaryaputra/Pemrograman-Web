<?php
$totalKursi = 45;
$kursiTerisi = 28;
$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKursiKosong = ($kursiKosong / $totalKursi) * 100;

echo "Persentase kursi yang masih kosong adalah: " . $persentaseKursiKosong . "%";
?>
