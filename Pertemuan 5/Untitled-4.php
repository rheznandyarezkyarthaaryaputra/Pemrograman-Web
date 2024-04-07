<?php
// membuat fungsi dengan nilai default untuk parameter
function perkenalan($nama = "teman", $salam = "Hi"){
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// memanggil fungsi tanpa memberikan parameter
perkenalan(); // akan menggunakan nilai default

echo "<hr>";

// memanggil fungsi dengan memberikan kedua parameter
perkenalan("Elok", "Selamat pagi");

// memanggil fungsi dengan memberikan salah satu parameter
perkenalan("Budi"); // $salam akan menggunakan nilai default "Hi"

?>
