<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locativy - Lost and Found</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- JavaScript -->
    <script>
        // Simulasi status login (true jika login, false jika tidak)
        let isLoggedIn = false; // Ganti dengan pengecekan dari backend

        function checkAuth() {
            if (!isLoggedIn) {
                window.location.href = '#'; // Arahkan ke halaman login jika belum login
            }
        }

        function logout() {
            if (confirm('Anda yakin ingin log out?')) {
                isLoggedIn = false;
                alert('Anda telah keluar');
                window.location.href = 'login.php'; // Arahkan ke halaman login setelah logout
            }
        }

        function showMessage() {
            alert('Fitur ini hanya tersedia untuk pengguna yang sudah login');
        }
    </script>
</head>

<body onload="checkAuth()">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <img class="navbar-brand" src="assets/image/Logo Locativy.png" style="height: 50px;" href="#">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="showMessage()">Message</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  Items
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" onclick="showMessage()">Lost item</a></li>
                  <li><a class="dropdown-item" href="#" onclick="showMessage()">Found items</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>
            </ul>
            <div class="button">
              <a class="login-button" type="submit" href="login.php">Login</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- Hero Section -->
    <div class="hero-section">
      <!-- Gambar Latar Belakang -->
      <img src="assets/image/icon-1.svg" alt="Background" class="background-image" style="margin-bottom: 10rem;">
      <!-- Konten Teks -->
      <div class="content">
        <h3 class="hero-1 fw-bold mb-4">
          We create <span>Solutions</span> for <br>Lost and Found
        </h3>
        <p class="text-hero-1">
          At Locativy, we are committed to providing the best <br> solution for handling lost items.
        </p>
        <div class="button">
          <a class="button-custom" type="submit" onclick="showMessage()">Report now!</a>
        </div>
      </div>
    
    </div>    

    <div class="service-section d-flex align-items-center">
      <div class="content-service">
        <h4 class="fw-bold mb-2">Service We <span style="color: #355AA9;">Offer</span> !</h4>
        <p class="text-muted">Here are the key services we offer:</p>
      </div>
    </div>

  <div class="row row-cols-2 row-cols-md-5 g-4" style="justify-content: center; margin-top: 1rem; gap: 2rem;">
    <div class="col">
      <div class="card d-flex flex-column h-100" style="transition: transform 0.3s ease; 
      background: white;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;"
      onmouseover="this.style.transform='translateY(-10px)'"
      onmouseout="this.style.transform='translateY(0)'">
        <img src="assets/image/Safe Privacy.png" 
            alt="Safe Privacy Icon" 
            style="width: 80px; height: auto; object-fit: contain; margin-top: 1rem; margin-left: 1rem;">
        <div class="card-body">
          <h5 class="card-title">Safe Privacy</h5>
          <p class="card-text">Our app makes it easy for users to arrange a secure meeting with the owner of found items for return..</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card d-flex flex-column h-100" style="transition: transform 0.3s ease;
      background: white;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;"
      onmouseover="this.style.transform='translateY(-10px)'"
      onmouseout="this.style.transform='translateY(0)'">
        <img src="assets/image/Easy Reports.png" 
            alt="Safe Privacy Icon" 
            style="width: 80px; height: auto; object-fit: contain; margin-top: 1rem; margin-left: 1rem;">
        <div class="card-body">
          <h5 class="card-title">Easy Reports</h5>
          <p class="card-text">Our app enables users to easily report lost items with detailed descriptions, last seen locations, and photos.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card d-flex flex-column h-100" style="transition: transform 0.3s ease;
      background: white;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;"
      onmouseover="this.style.transform='translateY(-10px)'"
      onmouseout="this.style.transform='translateY(0)'">
        <img src="assets/image/Easy to use.png" 
            alt="Safe Privacy Icon" 
            style="width: 80px; height: auto; object-fit: contain; margin-top: 1rem; margin-left: 1rem;">
        <div class="card-body">
          <h5 class="card-title">Easy to Use</h5>
          <p class="card-text">Our app makes it easy for users to arrange a secure meeting with the owner of found items for return.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card d-flex flex-column h-100" style="transition: transform 0.3s ease;
      background: white;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;"
      onmouseover="this.style.transform='translateY(-10px)'"
      onmouseout="this.style.transform='translateY(0)'">
        <img src="assets/image/Live Notifications.png" 
            alt="Safe Privacy Icon" 
            style="width: 80px; height: auto; object-fit: contain; margin-top: 1rem; margin-left: 1rem;">
        <div class="card-body">
          <h5 class="card-title">Live Notification</h5>
          <p class="card-text">Users will receive immediate notification when an item matches their lost report, saving time and effort.</p>
        </div>
      </div>
    </div>
  </div>

<!-- Benefit -->
<div class="section-benefit">
  <div class="row mt-5">
      <div class="col-md-6">
          <img src="assets/image/Lost and Found.png" style="height: 420px; margin-top: 2rem; margin-left: 2rem;" class="img-fluid" alt="Locativy">
      </div>
      <div class="col-md-6" style="margin-top: 5rem;">
          <h2 class="mb-1" style="font-weight: 600;">Benefits</h2>
          <span>The benefits you get if you use the locativy <br> application</span>
          <ul class="list-unstyled" style="margin-top: 2rem;">
            <div id="benefitAccordion">
                <li class="mb-3">
                  <img src="assets/image/1 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                  <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                    Speeds Up the Lost Item Search Process
                  </a>
                  <div class="collapse" id="collapseExample1" data-bs-parent="#benefitAccordion" style="margin-top: 1rem;">
                    Locativy helps you quickly find lost items by streamlining the process of reporting and searching.
                  </div>
                </li>
                <li class="mb-3">
                  <img src="assets/image/2 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                  <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                    No need to be confused about reporting found item
                  </a>
                  <div class="collapse" id="collapseExample2" data-bs-parent="#benefitAccordion" style="margin-top: 1rem;">
                    The app simplifies the process of reporting lost or found items. Whether you've lost something or found an item.
                  </div>
                </li>
                <li class="mb-3">
                  <img src="assets/image/3 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                  <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                    User-Friendly for Everyone
                  </a>
                  <div class="collapse" id="collapseExample3" data-bs-parent="#benefitAccordion" style="margin-top: 1rem;">
                    Locativy is designed to be intuitive and easy to use, so anyone, regardless of age or tech-savviness, can use it.
                  </div>
                </li>
                <li class="mb-3">
                  <img src="assets/image/4 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                  <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                    Real-Time Notifications
                  </a>
                  <div class="collapse" id="collapseExample4" data-bs-parent="#benefitAccordion" style="margin-top: 1rem;">
                    Locativy keeps you in the loop immediately so you don’t miss out on any important updates.
                  </div>
                </li>
            </div>
          </ul>
      </div>
  </div>
</div>

      <!-- About Section -->
    <div class="about-us-section">
      <!-- Gambar Latar Belakang -->
      <img src="assets/image/icon-2.svg" alt="Background" class="background-image" style="margin-bottom: 10rem;">
      <!-- Konten Teks -->
      <div class="about-content">
        <h4 class="about-1 fw-bold mb-4">
          Our Team
        </h4>
        <p class="text-about-1" style="font-style: italic;">
          The “Lost and Found” application is software designed to help people <br> track and identify lost or found items. 
          These applications are usually <br> used to create a platform where people can report lost items, search <br> 
          for lost items, or report found items. We apply this application in the <br> school environment...
        </p>
        <div class="a-about-1 mt-4">
          <a href="aboutus.html" class="button-custom px-4">Read More</a>
        </div>
      </div>
    </div>

    <section id="testimoni" class="testimoni pt-5 pb-5" >
      <div class="container">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
              <div class="carousel-inner text-center" style="padding: 0 11%;">
              <div class="carousel-item active">
                <div class="card text-center">
                  <div class="card-header">
                    Testimonial
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Imanuel, New York</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <img class="rounded-circle img-testimoni" src="assets/image/carousel 1.jpg" alt="First slide" style="border-radius: 90px;">
                  </div>
                  <div class="card-footer text-body-secondary">
                    2 days ago
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="card text-center">
                  <div class="card-header">
                    Testimonial
                  </div>
                <div class="card-body">
                  <h5 class="card-title">Alfred, London</h5>
                  <p class="card-text">Thank you! This website will make communication easier and more efficient within the school.</p>
                  <img class="rounded-circle img-testimoni" src="assets/image/carousel 2.jpg" alt="Second slide">
                </div>
                  <div class="card-footer text-body-secondary">
                    6 days ago
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="card text-center">
                  <div class="card-header">
                    Testimonial
                  </div>
                <div class="card-body">
                  <h5 class="card-title">De Louis, Paris</h5>
                  <p class="card-text">Salute! This website is very innovative and very useful for us. Thank you for creating this.</p>
                  <img class="rounded-circle img-testimoni" src="assets/image/carousel 3.jpg" alt="Third slide">
                </div>
                    <div class="card-footer text-body-secondary">
                      1 weeks ago
                    </div>
                  </div>
              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
            </div>    
          </div>
      </section>

        
      <!-- Call to Action Section -->
    <div class="cta-container">
      <h4>Ready to get started?</h4>
    </div>

<!-- Footer Section -->
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
