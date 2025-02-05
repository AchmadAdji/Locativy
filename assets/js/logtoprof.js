<script>
document.addEventListener("DOMContentLoaded", function () {
    let authButton = document.getElementById("authButton");
    let user = localStorage.getItem("user"); // Simpan status login di localStorage

    if (user) {
        authButton.innerHTML = `<img src="assets/image/user-profile.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">`;
        authButton.href = "profile.php"; // Ganti ke halaman profil
    }
});

// Simulasi login, panggil ini saat user berhasil login
function loginUser(username) {
    localStorage.setItem("user", username);
    location.reload(); // Reload untuk memperbarui tampilan navbar
}

// Simulasi logout, bisa dipanggil saat user logout
function logoutUser() {
    localStorage.removeItem("user");
    location.reload();
}
</script>
