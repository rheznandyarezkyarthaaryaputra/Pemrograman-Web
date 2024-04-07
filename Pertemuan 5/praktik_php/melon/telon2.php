<?php
function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>{$item['nama']}";
        if (isset($item['subMenu']) && is_array($item['subMenu'])) {
            tampilkanMenuBertingkat($item['subMenu']); // Recursive call for submenus
        }
        echo "</li>";
    }
    echo "</ul>";
}

// Example $menu array based on the structure in the image
$menu = [
    ["nama" => "Beranda"],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    ["nama" => "Pantai"],
                    ["nama" => "Gunung"]
                ]
            ],
            ["nama" => "Kuliner"],
            ["nama" => "Hiburan"]
        ]
    ],
    ["nama" => "Tentang"],
    ["nama" => "Kontak"]
];

tampilkanMenuBertingkat($menu);
?>
