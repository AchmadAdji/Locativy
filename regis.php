<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "locatify"; // Sesuaikan dengan database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password tidak cocok!');</script>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil!'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
        
        $stmt->close();
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <div class="left-panel">
            <h4 class="mb-3">Create an Account</h4>
            <p>Join us! Enter your details below:</p>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #355aa9;">Register</button>
            </form>
            <p class="mt-3">Already have an account? <a href="login.php">Log in</a></p>
        </div>
        <div class="right-panel">
            <h4>Welcome to Locativy.</h4>
            <p>Get started by creating your account today.</p>
        </div>
    </div>
</body>
</html>
