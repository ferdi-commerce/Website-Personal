<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "mis_group9");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

// Siapkan statement SQL
$stmt = $conn->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
if ($stmt === false) {
    die("Kesalahan saat mempersiapkan statement: " . $conn->error);
}

// Ikat parameter dan eksekusi statement
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    // Pendaftaran berhasil, alihkan ke halaman login
    header('Location: login.html');
    exit; // Hentikan eksekusi script setelah pengalihan
} else {
    // Log kesalahan untuk debug (jangan tampilkan kepada pengguna di produksi)
    error_log("Kesalahan: " . $stmt->error);
    echo "Terjadi kesalahan. Silakan coba lagi.";
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
