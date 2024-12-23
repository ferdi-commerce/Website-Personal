<?php
session_start();

// Clear the entire cart
unset($_SESSION['cart']);

// Display an empty cart
include 'show-cart.php';
?>
