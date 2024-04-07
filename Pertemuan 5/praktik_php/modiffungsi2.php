<?php
// membuat fungsi perkenalan
function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// memanggil fungsi yang sudah dibuat
perkenalan("pentol", "Hallo");

echo "<hr>";

$saya = "Eko";
$ucapanSalam = "Selamat pagi";

// memanggil lagi tanpa mengisi parameter salam
perkenalan($saya, $ucapanSalam);

// membuat fungsi hitungUmur
function hitungUmur($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

// mencetak umur
echo "Umur saya adalah " . hitungUmur(1988, 2023) . " tahun"; // isi sesuai dengan tahun lahir kalian
?>
