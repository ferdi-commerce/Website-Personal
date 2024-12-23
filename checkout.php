<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Checkout</h1>

    <?php
$itemName = $_POST['name'];
$itemPrice = $_POST['price'];

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$_SESSION['cart'][] = array('name' => $itemName, 'price' => $itemPrice);

$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'];
}

echo '<ul>';
foreach ($_SESSION['cart'] as $item) {
    echo '<li>' . $item['name'] . ' - Rp ' . $item['price'] . '</li>';
}
echo '</ul>';

echo '<p>Total Harga: Rp. ' . $totalPrice . '</p>';

function generateFormField($label, $id, $name, $required = true) {
    echo '<label for="' . $id . '">' . $label . ':</label>';
    if ($name === "order_id") {
        echo '<input type="text" id="' . $id . '" name="' . $name . '" required><br><br>';
    } else {
        echo '<textarea id="' . $id . '" name="' . $name . '" required></textarea><br><br>';
    }
}
?>

    <h2>Informasi Pembayaran:</h2>
    <form action="payment.php" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="address">Tempat:</label>
        <textarea id="table" name="table" required></textarea><br><br>
        <label for="card_number">Nomor Kartu Kredit:</label>
        <input type="text" id="card_number" name="card_number" required><br><br>
        <input type="submit" value="Bayar Sekarang">
    </form>
</body>
</html>
