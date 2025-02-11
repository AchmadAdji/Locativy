<?php
session_start();
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'Auth');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah pengguna sudah login melalui cookie
if (isset($_COOKIE['remember_me'])) {
    $_SESSION['username'] = $_COOKIE['remember_me'];
    header("Location: index.php");
    exit;
}

// Inisialisasi pesan error
$message = "";

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['rememberMe']); // Cek apakah remember me dicentang

    // Validasi input
    if (!empty($username) && !empty($password)) {
        // Ambil data pengguna berdasarkan username
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                // Jika "Remember Me" dicentang, simpan cookie
                if ($remember_me) {
                    setcookie("remember_me", $username, time() + (86400 * 30), "/"); // Berlaku 30 hari
                }

                // Redirect ke halaman utama setelah login sukses
                header("Location: index.html");
                exit;
            } else {
                $message = "Password salah!";
            }
        } else {
            $message = "Username tidak ditemukan!";
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
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="left-panel">
            <h4 class="mb-3">Log in to Locativy</h4>
            <p>Welcome back! Select method to log in:</p>
            
            <hr>
            <?php if (!empty($message)) : ?>
                <div class="alert alert-danger"><?= $message; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  
                    <a href="forgotpass.php" class="text-decoration-none">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #355aa9">Log in</button>
            </form>

            <p class="mt-3">Don't have an account? <a href="regis.php">Create an account</a></p>
        </div>
        <div class="right-panel">
            <h4>Connect with every application.</h4>
            <p>Everything you need in an easily customizable dashboard.</p>
        </div>
    </div>
</body>
</html>
