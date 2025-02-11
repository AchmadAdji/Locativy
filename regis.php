<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'auth');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = ""; // Variabel untuk menampilkan pesan

// Proses form register
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    
    // Validasi input
    if (!empty($username) && !empty($email) && !empty($_POST['password'])) {
        // Periksa apakah username atau email sudah digunakan
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "Username atau Email sudah digunakan!";
        } else {
            // Masukkan data ke database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $username, $email, $password);

            if ($stmt->execute()) {
                $message = "Registrasi berhasil! Silakan login.";
            } else {
                $message = "Terjadi kesalahan: " . $conn->error;
            }
        }
    } else {
        $message = "Harap isi semua data!";
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
            
            <!-- Pesan sukses/gagal -->
            <?php if (!empty($message)) : ?>
                <div class="alert alert-info text-center"><?= $message; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
                </div>
                                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            
            <p class="mt-3">Already have an account? <a href="login.php">Log in</a></p>
        </div>
        <div class="right-panel">
            <h4>Welcome to Locativy</h4>
            <p>Get started by creating your account today.</p>
        </div>
    </div>
</body>
</html>
