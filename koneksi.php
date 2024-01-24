<?php
$hostname = "localhost";  
$username_db = "root";  
$password_db = "";  
$database = "db_tugasakhir";  // Ganti dengan nama database kamu

// Membuat koneksi ke database
$conn = new mysqli($hostname, $username_db, $password_db, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM nama_tabel WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "Login berhasil!";
} else {
    echo "Login gagal. Periksa kembali username dan password.";
}

$conn->close();
