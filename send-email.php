<?php
$conn = mysqli_connect("localhost", "root", "", "mis_group9");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = 'indri.nainggolan23@student.president.ac.id';
$subject = 'New Contact Form Submission';
$headers = 'From: ' . $email;

$sql = "INSERT INTO contact_message (name, email, message) VALUES ('$name', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Message sent successfully!";
    header('Location: thank_you.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mail($to, $subject, $message, $headers);
// Close connection
$conn->close();
?>