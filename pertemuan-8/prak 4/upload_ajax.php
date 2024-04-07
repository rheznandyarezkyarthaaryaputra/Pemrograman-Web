<?php
if (isset($_FILES['file'])) {
    $allowed_extensions = ["pdf", "doc", "docx", "txt"];
    $max_file_size = 2097152; // 2 MB

    $file_name = $_FILES['file']['name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (!in_array($file_ext, $allowed_extensions)) {
        echo "Ekstensi file tidak diizinkan.";
    } elseif ($file_size > $max_file_size) {
        echo "Ukuran file terlalu besar.";
    } else {
        move_uploaded_file($file_tmp, "documents/" . $file_name);
        echo "File berhasil diunggah.";
    }
}

?>
