<?php
$conn = new mysqli('localhost', 'root', '', 'locativy');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
