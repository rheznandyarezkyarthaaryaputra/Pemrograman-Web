<?php

$menu = [
    [
        'name' => 'Makanan',
        'items' => [
            ['name' => 'Nasi Goreng'],
            ['name' => 'Mie Ayam'],
            ['name' => 'Sate Ayam']
        ]
    ],
    [
        'name' => 'Minuman',
        'items' => [
            ['name' => 'Es Teh'],
            ['name' => 'Es Jeruk'],
            ['name' => 'Kopi']
        ]
    ]
];

function displayMenu($menu) {
    foreach ($menu as $item) {
        if (isset($item['name'])) {
            echo $item['name'] . "\n";
        }
        if (isset($item['items']) && is_array($item['items'])) {
            displayMenu($item['items']);
        }
    }
}

displayMenu($menu);
?>
