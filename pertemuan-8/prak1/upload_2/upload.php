<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "upload_2/"; // Direktori tujuan untuk menyimpan file

    if (!file_exists($targetDirectory)) {
        if (!mkdir($targetDirectory, 0777, true)) {
            echo "Gagal membuat direktori upload_2.";
            exit;
        }
    }

    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "File berhasil diunggah.";
    } else {
        echo "Gagal mengunggah file.";
        if (file_exists($targetFile)) {
            echo "File dengan nama yang sama telah ada.";
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>
