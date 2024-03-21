<?php

function perkenalan($salam, $nama){
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// Memanggil fungsi dengan nilai parameter yang berbeda
perkenalan("Assalamualaikum", "Elok");
perkenalan("Selamat pagi", "Agung");

?>
