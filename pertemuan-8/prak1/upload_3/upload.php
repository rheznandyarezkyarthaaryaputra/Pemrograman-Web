<?php
// Pastikan file diunggah dan tersedia dalam $_FILES
if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
    // Handle error when no file is uploaded
    echo "Error: No file uploaded.";
    exit;
}

// Path file yang diunggah
$targetFile = $_FILES["fileToUpload"]["tmp_name"];

// Mengambil ukuran asli gambar
list($width, $height, $type) = getimagesize($targetFile);

// Menghitung tinggi thumbnail berdasarkan lebar 200 piksel
$newHeight = (int) (200 * $height / $width);

// Membuat gambar thumbnail
$thumbnail = imagecreatetruecolor(200, $newHeight);

// Mengambil gambar asli berdasarkan jenis file
switch ($type) {
    case IMAGETYPE_JPEG:
        $image = imagecreatefromjpeg($targetFile);
        break;
    case IMAGETYPE_PNG:
        $image = imagecreatefrompng($targetFile);
        break;
    case IMAGETYPE_GIF:
        $image = imagecreatefromgif($targetFile);
        break;
    default:
        // Handle error when file is not an image
        echo "Error: File is not an image.";
        exit;
}

// Menyalin dan menyesuaikan gambar asli ke thumbnail
if (!isset($image)) {
    // Handle error when image is not set
    echo "Error: Image not set.";
    exit;
}

imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, 200, $newHeight, $width, $height);

// Menyimpan thumbnail ke file
$targetDirectory = "path/to/thumbnail/directory/";
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

$thumbnailFile = $targetDirectory . "thumb_" . basename($_FILES["fileToUpload"]["name"]);

switch ($type) {
    case IMAGETYPE_JPEG:
        imagejpeg($thumbnail, $thumbnailFile);
        break;
    case IMAGETYPE_PNG:
        imagepng($thumbnail, $thumbnailFile);
        break;
    case IMAGETYPE_GIF:
        imagegif($thumbnail, $thumbnailFile);
        break;
}

// Menghapus gambar yang sudah diunggah
imagedestroy($image);
imagedestroy($thumbnail);

echo "Thumbnail berhasil dibuat.";
?>
