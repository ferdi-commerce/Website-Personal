<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: checkout.php");
    exit();
}

// Process payment and collect customer information
$name = $_POST['name'];
$table = $_POST['table'];
$cardNumber = $_POST['card_number'];

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];  // Pastikan quantity dihitung
}

// Connect to the database
require_once 'config.php';

try {
    // Mulai transaksi
    $pdo->beginTransaction();

    // Masukkan data pembayaran dan informasi pelanggan
    $stmt = $pdo->prepare("INSERT INTO payments (name, table_number, card_number, total_price) 
                           VALUES (:name, :table, :card_number, :total_price)");
    $stmt->execute(['name' => $name, 'table' => $table, 'card_number' => $cardNumber, 'total_price' => $totalPrice]);

    // Dapatkan ID order yang baru saja dimasukkan
    $order_id = $pdo->lastInsertId();

    // Insert order items into the database
    foreach ($_SESSION['cart'] as $item) {
        $stmt = $pdo->prepare("INSERT INTO checkout (order_id, item_id, quantity, total_price) 
                               VALUES (:order_id, :item_id, :quantity, :total_price)");
        $stmt->execute([
            'order_id' => $order_id,
            'item_id' => $item['id'],
            'quantity' => $item['quantity'],
            'total_price' => $item['price'] * $item['quantity']  // Menghitung total harga item
        ]);
    }

    // Commit transaksi
    $pdo->commit();

    // Clear the cart
    unset($_SESSION['cart']);

    // Redirect to order details page
    header("Location: order_details.php?id=$order_id");
    exit();
} catch(PDOException $e) {
    // Rollback jika terjadi error
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
