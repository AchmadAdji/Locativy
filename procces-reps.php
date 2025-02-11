<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $item = $_POST['item'];
    $type_report = $_POST['type_report'];

    // Upload file
    $target_dir = "uploads/"; // Pastikan folder ini ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $file_name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    // Simpan ke database
    $sql = "INSERT INTO tb_reports (username, item, type_report, file) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $item, $type_report, $file_name);

    if ($stmt->execute()) {
        echo "<script>alert('Laporan berhasil dikirim!'); window.location.href='listpage.html';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>
