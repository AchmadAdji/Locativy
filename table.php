<?php
include 'config.php';

// Fungsi Hapus Data
if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM barang_hilang WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='table.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
}

// Fungsi Tambah Data
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $jenis_barang = $_POST['jenis_barang'];
    $jenis_laporan = $_POST['jenis_laporan'];
    $tempat_barang = $_POST['tempat_barang'];
    $gambar = $_FILES['gambar']['name'];
    $target = "uploads/" . basename($gambar);
    
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO barang_hilang (username, jenis_barang, jenis_laporan, tempat_barang, gambar) 
                VALUES ('$username', '$jenis_barang', '$jenis_laporan', '$tempat_barang', '$gambar')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='table.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data!');</script>";
        }
    }
}

// Fungsi Edit Data
if (isset($_POST['edit'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['username'];
    $jenis_barang = $_POST['jenis_barang'];
    $jenis_laporan = $_POST['jenis_laporan'];
    $tempat_barang = $_POST['tempat_barang'];
    $gambar = $_FILES['gambar']['name'];
    
    if ($gambar != "") {
        $target = "uploads/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $sql = "UPDATE barang_hilang SET username='$username', jenis_barang='$jenis_barang', jenis_laporan='$jenis_laporan', 
                tempat_barang='$tempat_barang', gambar='$gambar' WHERE id='$id'";
    } else {
        $sql = "UPDATE barang_hilang SET username='$username', jenis_barang='$jenis_barang', jenis_laporan='$jenis_laporan', 
                tempat_barang='$tempat_barang' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='table.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Barang Hilang - Locativy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
   
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Table Barang Hilang</h2>
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>

    <div class="table-responsive">
        <table id="barangHilangTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Jenis Barang</th>
                    <th>Jenis Laporan</th>
                    <th>Tempat Barang Disimpan</th>
                    <th>Gambar</th>
                    <th>Waktu Pelaporan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM barang ORDER BY created_at DESC";
                $result = $conn->query($sql);
                $no = 1;

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['jenis_barang']}</td>
                            <td>{$row['jenis_laporan']}</td>
                            <td>{$row['tempat_barang']}</td>
                            <td><img src='uploads/{$row['gambar']}' width='50'></td>
                            <td>{$row['waktu_pelaporan']}</td>
                            <td>
                                <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' onclick='editData({$row['id']})'>Edit</button>
                                <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal' onclick='deleteData({$row['id']})'>Hapus</button>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Barang Hilang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="username" class="form-control" placeholder="Username" required><br>
                    <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang" required><br>
                    <select name="jenis_laporan" class="form-control" required>
                        <option value="Laporan Kehilangan Barang">Kehilangan</option>
                        <option value="Laporan Menemukan Barang">Menemukan</option>
                    </select><br>
                    <input type="text" name="tempat_barang" class="form-control" placeholder="Tempat Barang" required><br>
                    <input type="file" name="gambar" class="form-control" required><br>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('#barangHilangTable').DataTable();
});
</script>
<script src="assets/js/sidebar.js"></script>
<script src="assets/js/table.js"></script>

</body>
</html>
