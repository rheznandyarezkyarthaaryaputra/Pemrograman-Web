<?php
// Define a multi-dimensional array to store data for Foto A and Foto B
$data = [
    'Foto A' => [
        'nama' => 'rheznandya',
        'alamat' => 'jalan cililuwung',
        'No tlp' => '83838933',
        'jurusan' => 'sib',
        'gambar' => 'testA.jpeg' // Replace with actual path to the image file for Foto A
    ],
    'Foto B' => [
        'nama' => 'bajo',
        'alamat' => 'gimanuk',
        'No tlp' => '92882',
        'jurusan' => 'TI',
        'gambar' => 'testB.jpeg' // Replace with actual path to the image file for Foto B
    ]
];

// Loop through the array and generate HTML content to display the data and images
foreach ($data as $foto => $details) {
    echo "<div>";
    echo "<h3>" . $foto . " details:</h3>";
    echo "<img src='" . $details['gambar'] . "' alt='Image for " . $foto . "'>";
    echo "<p>Nama: " . $details['nama'] . "</p>";
    echo "<p>Alamat: " . $details['alamat'] . "</p>";
    echo "<p>No Tlp: " . $details['No tlp'] . "</p>";
    echo "<p>Jurusan: " . $details['jurusan'] . "</p>";
    echo "</div>";
}
?>
