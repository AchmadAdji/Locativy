<?php
session_start();

// Koneksi ke database
$host = "localhost";
$username = "root"; // Ganti jika username MySQL berbeda
$password = ""; // Ganti jika ada password MySQL
$database = "locativy";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirmPassword"];

    // Validasi password
    if ($password !== $confirm_password) {
        echo "<script>alert('Password tidak cocok!'); window.location.href='register.html';</script>";
        exit();
    }

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi.'); window.location.href='register.html';</script>";
    }
    
    $stmt->close();
}

$conn->close();
?>
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/regis.css">

</head>
<body>
    <div class="register-container">
        <div class="left-panel">
            <h4 class="mb-3">Create an Account</h4>
            <p>Join us! Enter your details below:</p>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">username                  .30</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <p class="mt-3">Already have an account? <a href="#">Log in</a></p>
        </div>
        <div class="right-panel">
            <h4>Welcome to Locativy</h4>
            <p>Get started by creating your account today.</p>
        </div>
    </div>
</body>
</html>
