<?php
// Menghitung dan menampilkan nilai dan rata-rata
$nilaiMatematika = 5.1;
$nilaiIPA = 6.7;
$nilaiBahasaIndonesia = 9.3;

// Menghitung rata-rata
$rataRata = ($nilaiMatematika + $nilaiIPA + $nilaiBahasaIndonesia) / 3;

// Menampilkan nilai dan rata-rata dengan dua angka desimal
echo "Matematika: {$nilaiMatematika} <br>";
echo "IPA: {$nilaiIPA} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata-rata: " . number_format($rataRata, 2) . " <br>";

// Debugging nilai rata-rata
var_dump($rataRata);

// Operasi matematika sederhana dan menampilkan hasilnya
$a = 10;
$b = 5;
$c = $a + 5;
$d = $b + (10 * 5);
$e = $d - $c;

echo "Variabel a: {$a}<br>";
echo "Variabel b: {$b}<br>";
echo "Variabel c: {$c}<br>";
echo "Variabel d: {$d}<br>";
echo "Variabel e: {$e}<br>";

// Debugging nilai e
var_dump($e);

// Menampilkan status siswa
$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;

// Debugging status siswa
var_dump($apakahSiswaLulus);
echo "<br>";
var_dump($apakahSiswaSudahUjian);
echo "<br>";

// Menampilkan nama lengkap
$namaDepan = "Ibnu";
$namaBelakang = 'Jakaria';
$namaLengkap = "{$namaDepan} {$namaBelakang}";

echo "Nama Depan: {$namaDepan} <br>";
echo "Nama Belakang: {$namaBelakang} <br>";
echo "Nama Lengkap: {$namaLengkap}<br>";

// Menampilkan nama mahasiswa pertama dalam array
$listMahasiswa = ["Wahid Abdullah", "Elmo Bachtiar", "Lendis Fabri"];
echo "Mahasiswa pertama: " . $listMahasiswa[0] . "<br>";
?>
