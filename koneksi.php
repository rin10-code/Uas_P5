<?php
$host = "localhost";
$user = "root";
$pass = ""; // default XAMPP
$dbname = "notes_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>