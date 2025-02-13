let isLoggedIn = false;
function checkAuth() {
    if (!isLoggedIn) {
        window.location.href = 'login.html'; // Arahkan ke halaman login jika belum login
    }
}

function logout() {
    if (confirm('Anda yakin ingin log out?')) {
        isLoggedIn = false;
        alert('Anda telah keluar');
        window.location.href = 'login.html'; // Arahkan ke halaman login setelah logout
    }
}

function showMessage() {
    alert('Masuk untuk mengakses halaman ini');
}