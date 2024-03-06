<?php
$siswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90]
];

// Menghitung rata-rata
$jumlahNilai = 0;
foreach ($siswa as $dataSiswa) {
    $jumlahNilai += $dataSiswa[1]; // Menambahkan nilai siswa ke total
}
$rataRata = $jumlahNilai / count($siswa);

// Mencetak daftar siswa yang nilainya di atas rata-rata
echo "Daftar nilai siswa yang di atas rata-rata (Rata-rata: $rataRata):<br>";
foreach ($siswa as $dataSiswa) {
    if ($dataSiswa[1] > $rataRata) {
        echo "Nama: {$dataSiswa[0]}, Nilai: {$dataSiswa[1]}<br>";
    }
}
?>
