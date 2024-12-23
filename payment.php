<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "mis_group9");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve payment information from session
$name = $_POST['name'];
$table = $_POST['table'];
$card_number = $_POST['card_number'];

// Insert payment information into the database
$sql = "INSERT INTO payments (name, table_number, card_number) VALUES ('$name', '$table', '$card_number')";

if ($conn->query($sql) === TRUE) {
    echo "Payment information saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: checkout.php");
    exit();
}

echo "<h2>Informasi Pembayaran:</h2>";
echo "<p>Nama: $name</p>";
echo "<p>Meja: $table</p>";
echo "<p>Nomor Kartu Kredit: $card_number</p>";

echo "<h2>Item yang Dipesan:</h2>";
echo "<ul>";
foreach ($_SESSION['cart'] as $item) {
    echo "<li>" . $item['name'] . " - Rp " . $item['price'] . "</li>";
}
echo "</ul>";

$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'];
}
echo "<p>Total Harga: Rp. $totalPrice</p>";

unset($_SESSION['cart']);
header('process_order.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0066cc;
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            margin-bottom: 12px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .total-price {
            font-weight: bold;
            font-size: 18px;
            color: #ff6600;
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .buttons a {
            text-decoration: none;
            background-color: #0066cc;
            color: #fff;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #005bb5;
        }

        .buttons a.logout {
            background-color: #ff4c4c;
        }

        .buttons a.logout:hover {
            background-color: #e02e2e;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Order Successfully Processed</h1>
        <p>Terima kasih atas pesanan Anda!</p>

        <h2>Informasi Pembayaran:</h2>
        <p>Nama: <?php echo $name; ?></p>
        <p>Meja: <?php echo $table; ?></p>
        <p>Nomor Kartu Kredit: <?php echo $card_number; ?></p>

        <h2>Item yang Dipesan:</h2>
        <ul>
            <?php
            foreach ($_SESSION['cart'] as $item) {
                echo "<li>" . $item['name'] . " - Rp " . $item['price'] . "</li>";
            }
            ?>
        </ul>

        <p class="total-price">Total Harga: Rp. <?php echo $totalPrice; ?></p>

        <div class="buttons">
            <a href="contact.php">Contact Us</a>
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </div>

</body>
</html>
