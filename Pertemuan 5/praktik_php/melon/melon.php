<?php
function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>" . $item['nama'];
        if (array_key_exists('subMenu', $item)) {
            tampilkanMenuBertingkat($item['subMenu']); // Recursive call to handle submenus
        }
        echo "</li>";
    }
    echo "</ul>";
}

// Your $menu array would go here
$menu = [
    // ... The $menu array as defined previously
];

tampilkanMenuBertingkat($menu);
?>
