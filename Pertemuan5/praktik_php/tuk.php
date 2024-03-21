<?php
function tampilkanAngka(int $jumlah, int $indeks = 1) {
    echo "Perulangan ke-{$indeks} <br>";

    // Call itself as long as $indeks is less than $jumlah
    if ($indeks < $jumlah) {
        tampilkanAngka($jumlah, $indeks + 1);
    }
}

tampilkanAngka(20);
?>
