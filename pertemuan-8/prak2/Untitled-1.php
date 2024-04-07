<?php
// Lokasi penyimpanan file gambar yang diunggah
$targetDirectory = "images/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Periksa apakah ada file yang diunggah dengan kunci 'files'
if (isset($_FILES['files'])) {
    $totalFiles = count($_FILES['files']['name']);

    // Loop melalui semua file gambar yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $targetFile = $targetDirectory . $fileName;

        // Daftar ekstensi file gambar yang diizinkan
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

        // Periksa apakah file adalah gambar dan apakah ekstensinya diizinkan
        if (in_array($fileType, $allowedTypes)) {
            // Periksa apakah nama file tidak kosong dan memindahkan file yang diunggah
            if (!empty($_FILES['files']['name'][$i]) && move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File gambar $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file gambar $fileName.<br>";
            }
        } else {
            echo "File $fileName bukan gambar atau tipe file tidak diizinkan.<br>";
        }
    }
} else {
    echo "Tidak ada file gambar yang diunggah.";
}
?>
