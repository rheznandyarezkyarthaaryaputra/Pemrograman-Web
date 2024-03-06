<?php
// Daftar nilai siswa
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

// Mengurutkan nilai siswa
sort($nilaiSiswa);

// Mengabaikan dua nilai terendah dan dua nilai tertinggi
$nilaiSiswaTanpaEkstrem = array_slice($nilaiSiswa, 2, -2);

// Menghitung total nilai
$totalNilai = array_sum($nilaiSiswaTanpaEkstrem);

// Menghitung rata-rata
$rataRata = $totalNilai / count($nilaiSiswaTanpaEkstrem);

// Mencetak hasil
echo "Total nilai setelah mengabaikan dua nilai tertinggi dan terendah: " . $totalNilai . "<br>";
echo "Rata-rata nilai: " . $rataRata;
?>
