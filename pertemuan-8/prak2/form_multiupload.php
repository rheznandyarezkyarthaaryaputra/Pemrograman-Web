<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "documents/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Periksa apakah ada file yang diunggah dengan kunci 'files'
if (isset($_FILES['files'])) {
    $totalFiles = count($_FILES['files']['name']);

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        // Periksa apakah nama file tidak kosong
        if (!empty($_FILES['files']['name'][$i])) {
            $fileName = $_FILES['files']['name'][$i];
            $targetFile = $targetDirectory . $fileName;

            // Pindahkan file yang diunggah ke direktori penyimpanan
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "Nama file tidak tersedia.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
