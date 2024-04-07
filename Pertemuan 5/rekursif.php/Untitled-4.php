<?php

$menu = [
    [
        "nama" => "Beranda"
    ],
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
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ]
];

function tampilkanMenuBertingkat(array $menu, $level = 0) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>";
        // We no longer need the str_repeat for indentation in HTML
        echo htmlspecialchars($item['nama']);
        if (isset($item['subMenu']) && is_array($item['subMenu'])) {
            // Recursive call if 'subMenu' is present
            tampilkanMenuBertingkat($item['subMenu'], $level + 1);
        }
        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>
