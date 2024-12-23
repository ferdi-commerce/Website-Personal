<?php

if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $index => $item) {
        echo '<li>'.$item['name'].' - Rp '.$item['price'].' <button onclick="deleteItem('.$index.')">Delete</button></li>';
    }
} else {
    echo '<li>Keranjang belanja kosong.</li>';
}
?>
