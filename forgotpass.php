<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'locatify');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Cek apakah email terdaftar
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50)); // Generate token unik
        $exp_time = date("Y-m-d H:i:s", strtotime('+1 hour')); // Expired dalam 1 jam

        // Simpan token ke database
        $stmt = $conn->prepare("UPDATE users SET reset_token=?, reset_expiry=? WHERE email=?");
        $stmt->bind_param('sss', $token, $exp_time, $email);
        $stmt->execute();

        // Kirim email ke pengguna
        $reset_link = "http://localhost/locatify/reset_password.php?token=" . $token;
        $subject = "Reset Password - Locativy";
        $message = "Klik link berikut untuk mereset password Anda: " . $reset_link;
        $headers = "From: no-reply@locatify.com";

        if (mail($email, $subject, $message, $headers)) {
            $message = "Silakan cek email Anda untuk reset password.";
        } else {
            $message = "Gagal mengirim email!";
        }
    } else {
        $message = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .forgot-container {
            width: 900px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
        }
        .left-panel, .right-panel {
            padding: 40px;
            flex: 1;
        }
        .left-panel {
            background: white;
        }
        .right-panel {
            background: #355aa9;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <div class="left-panel">
            <h4 class="mb-3">Reset Your Password</h4>
            <p>Enter your email to reset your password:</p>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your new password">
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your new password">
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #355aa9">Reset Password</button>
            </form>
            <p class="mt-3">Remembered your password? <a href="login.php">Log in</a></p>
        </div>
        <div class="right-panel">
            <h4>Reset your password securely.</h4>
            <p>Follow the steps to recover your account.</p>
        </div>
    </div>
</body>
</html>


