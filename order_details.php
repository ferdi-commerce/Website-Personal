<?php
require_once 'config.php';

$order_id = $_GET['id']; 

$stmt = $pdo->prepare("SELECT * FROM order_items WHERE id = :order_id");
$stmt->execute(['order_id' => $order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Query to fetch order status history
$stmt = $pdo->prepare("SELECT * FROM checkout WHERE order_id = :order_id ");
$stmt->execute(['order_id' => $order_id]);
$order_status_history = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>

    <h2>Order #<?php echo $order_id; ?></h2>
    <p>Customer Name: <?php echo $order['customer_name']; ?></p>
    <p>Table: <?php echo $order['table_number']; ?></p>

    <h3>Items Ordered</h3>
    <ul>
        <?php
        foreach ($order_items as $item) {
            echo "<li>{$item['item_name']} - Rp {$item['item_price']}</li>";
        }
        ?>
    </ul>

    <h3>Order Status History</h3>
    <ul>
        <?php
        foreach ($order_status_history as $status) {
            echo "<li>{$status['status']} - {$status['timestamp']}</li>";
        }
        ?>
    </ul>
</body>
</html>
