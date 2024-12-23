<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "mis_group9");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// Insert data into database
$sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Login successful";
    header('Location: menu.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>