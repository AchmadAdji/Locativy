<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // Sesuaikan dengan user database kamu
$pass = ""; // Sesuaikan dengan password database kamu
$db = "auth"; // Sesuaikan dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari database
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// Ambil data dari tb_reports dengan type_report "Lost Item"
$sql_reports = "SELECT * FROM tb_reports WHERE type_report = 'Found Item'";
$result_reports = $conn->query($sql_reports);

if ($result_reports->num_rows > 0) {
    while ($row = $result_reports->fetch_assoc()) {
        $description = isset($row['spesification']) ? $row['spesification'] : '';
        if (str_word_count($description) > 20) {
            $words = explode(' ', $description);
            $description = implode(' ', array_slice($words, 0, round(count($words) * 2 / 3))) . '...';
        }
        $items[] = [
            'title' => $row['item'],
            'img' => $row['file_path'],
            'dataName' => $row['id'],
            'username' => $row['username'],
            'specification' => $row['specification'],
            'quantity' => $row['quantity'],
            'location' => $row['location'],
            'time_found' => $row['time_found']
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locativy - List Item Found</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/listpage.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <script>
        let isLoggedIn = true; // Ganti dengan pengecekan dari backend

        function checkAuth() {
            if (!isLoggedIn) {
                 window.location.href = 'Login.php'; // Arahkan ke halaman login jika belum login
            }
        }
    </script>
</head>
<body onload="checkAuth()">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <img class="navbar-brand" src="assets/image/Logo Locativy.png" style="height: 50px;" href="#">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://gmeqx7bp.chat.qbusiness.us-west-2.on.aws/">Chat with Ai</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Items</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="lost-item.php">Lost item</a></li>
                                <li><a class="dropdown-item" href="found-item.php">Found items</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="aboutus.html">About Us</a></li>
                    
                    <div class="button">
                        <a class="login-button" type="submit" href="report.php">Report</a>
                    </div>
                </ul>
                
            </div>
        </div>
    </nav>

    <!-- Search Bar -->
    <div class="row" style="margin-top: 10rem;">
        <nav class="navbar-brand">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search" id="searchbox" onkeyup="filterItems()">
            </div>
        </nav>
    </div>

    <!-- List Page -->
    <div class="container" style="margin-top: 5rem;">
        <div class="row" id="items-container">
            <?php foreach ($items as $item): ?>
                <div class="col-md-3 mb-4 item-card" data-title="<?= strtolower($item['title']) ?>" onclick="showDetails('<?= $item['title'] ?>', '<?= $item['img'] ?>', '<?= $item['username'] ?>', '<?= $item['specification'] ?>', '<?= $item['quantity'] ?>', '<?= $item['location'] ?>', '<?= $item['time_found'] ?>')">
                    <div class="card text-white">
                        <img src="<?= $item['img'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['title'] ?></h5>
                            <p class="card-text"><?= $item['specification'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Pagination">
        <ul class="pagination justify-content-center" style="margin-top: 5rem;">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Item Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="modal-img" src="" class="img-fluid" alt="Item Image">
                        </div>
                        <div class="col-md-6">
                            <h5 id="modal-title" class="mt-3"></h5>
                            <p id="modal-username"></p>
                            <p id="modal-specification"></p>
                            <p id="modal-quantity"></p>
                            <p id="modal-location"></p>
                            <p id="modal-time-found"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterItems() {
            let input = document.getElementById("searchbox").value.toLowerCase();
            let items = document.getElementsByClassName("item-card");
            for (let i = 0; i < items.length; i++) {
                let title = items[i].getAttribute("data-title");
                if (title.includes(input)) {
                    items[i].style.display = "block";
                } else {
                    items[i].style.display = "none";
                }
            }
        }

        function showDetails(title, img, username, specification, quantity, location, time_found) {
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-img').src = img;
            document.getElementById('modal-username').innerText = username;
            document.getElementById('modal-specification').innerText = "Specification: " + specification;
            document.getElementById('modal-quantity').innerText = "Quantity: " + quantity;
            document.getElementById('modal-location').innerText = "Location: " + location;
            document.getElementById('modal-time-found').innerText = "Time Found: " + time_found;
            var myModal = new bootstrap.Modal(document.getElementById('detailsModal'));
            myModal.show();
        }
    </script>
    <!-- Footer -->
  <footer class="footer">
    <div class="footer-content" style="margin-top: 50px;">
        <div class="footer-column">
            <h3>Get started</h3>
            <ul>
              <li><a href="regis.php">Create an account</a></li>
              <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Get help</h3>
            <ul>
                <li><a href="report.php">Reporting</a></li>
                <li><a href="lost-item.php">Lost item</a></li>
                <li><a href="found-item.php">Found item</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>About us</h3>
            <ul>
                <li><a href="aboutus.html">Our Team</a></li>
            </ul>
        </div>
    </div>

      <!-- Social Media & Logo -->
      <div class="footer-bottom">
          <div class="social-icons">
            <a href="https://www.instagram.com/locativy?igsh=bnk4ZHd1aXB1a2E4"><i class="fa-brands fa-square-instagram" style="color: #355aa9;"></i></a>
              <i class="fa-brands fa-x-twitter" style="color: #355aa9;"></i>
              <i class="fa-solid fa-envelope" style="color: #355aa9;"></i>
          </div>
          <div class="footer-logo">
              <img src="assets/image/Logo Locativy - Blue.png" alt="Locativy">
          </div>
      </div>
    </footer>
</body>
</html>
