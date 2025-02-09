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
</head>
<body>
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
                <a class="nav-link active" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Message</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  Items
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="listpage.html">Lost item</a></li>
                  <li><a class="dropdown-item" href="#">Foud items</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
            </ul>
            <div class="button">
              <a class="login-button" type="submit">Login</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- Hero Section -->
    <div class="hero-section d-flex align-items-center fixed">
      <div class="content">
        <h2 class="hero-1 fw-bold mb-4">We Create <span style="color: #355AA9;">Solutions</span> for<p>Lost and Found</p></h2>
        <p class="text-hero-1">At Locativy, we are committed to providing the<br>best solution for handling lost items.</p>
        <div class="a-hero-1 mt-4">
          <a href="form-report.html" class="btn-custom-lapor px-4">Report Now!</a>
        </div>
      </div>
      <div class="illustration">
        <img src="assets/image/undraw_web-search_9qqc 1.png" class="img-fluid" alt="Illustration" style="height: 350px;">
      </div>
    </div>

    <div class="icon-border">
      <div class="illustration-1">
        <img src="assets/image/icon.png" class="img-fluid-border" alt="Illustration" style="height: auto; object-fit: contain; width: 100%;">
      </div>
    </div>

    <div class="second-section d-flex align-items-center">
      <div class="content">
        <h4 class="fw-bold mb-2">Service We <span style="color: #355AA9;">Offer</span> !</h4>
        <p class="text-muted">Here are the key services we offer:</p>
      </div>
    </div>

  <div class="row row-cols-2 row-cols-md-5 g-4" style="justify-content: center; margin-top: 1rem; gap: 2rem;">
    <div class="col">
      <div class="card d-flex flex-column" style="transition: transform 0.3s ease; 
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
      <div class="card d-flex flex-column" style="transition: transform 0.3s ease;
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
      <div class="card d-flex flex-column" style="transition: transform 0.3s ease;
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
      <div class="card d-flex flex-column" style="transition: transform 0.3s ease;
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
      <div class="col-md-6" style="margin-top: 3rem;">
          <h2 class="mb-1" style="font-weight: 600;">Benefits</h2>
          <span>The benefits you get if you use the locativy <br> application</span>
          <ul class="list-unstyled" style="margin-top: 2rem;">
            <li class="mb-3">
              <img src="assets/image/1 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
              <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                Speeds Up the Lost Item Search Process
              </a>
                 <div class="collapse" id="collapseExample1" style="margin-top: 1rem;">
                  Locativy helps you quickly find lost items by streamlining the process of reporting and searching.
                  </div>
            </li>
              <li class="mb-3">
                <img src="assets/image/2 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                  No need to be confused about reporting found item
                </a>
                   <div class="collapse" id="collapseExample2" style="margin-top: 1rem;">
                    The app simplifies the process of reporting lost or found items. Whether you've lost something or found an item.
                    </div>
              </li>
              <li class="mb-3">
                <img src="assets/image/3 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                  User-Friendly for Everyone
                </a>
                   <div class="collapse" id="collapseExample3" style="margin-top: 1rem;">
                    Locativy is designed to be intuitive and easy to use, so anyone, regardless of age or tech-savviness, can use it.
                    </div>
              </li>
              <li class="mb-3">
                <img src="assets/image/4 (1).png" alt="" style="height: 40px; margin-right: 10px;">  
                <a class="btn-block dropdown-toggle" style="font-weight: 700; text-decoration: none; color: #1b1b1b;" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Real-Time Notifications
                </a>
                   <div class="collapse" id="collapseExample4" style="margin-top: 1rem;">
                    Locativy keeps you in the loop immediately so you don’t miss out on any important updates.
                    </div>
              </li>
          </ul>
          <div class="row" style="margin-top: 2rem;">
            <div class="col d-flex align-items-center">
                <button class="btn-getstarted me-4" style="width: 200px;">Get started</button>
                <button class="btn-readmore" style="width: 200px;">Read More</button>
            </div>
          </div>
      </div>

      <div class="about-us-section d-flex align-items-center fixed" id="our-team">
        <div class="content-about-us">
          <h2 class="our-team fw-bold mb-4">Our Team</h2>
          <p class="text-about" style="font-style: italic;">
            The “Lost and Found” application is software designed to help <br> people track and identify lost or found items. 
            These <br> applications are usually used to create a platform where <br>
            people can report lost items, search for lost items, 
            or report <br> found items. We apply this application in the school environment
          </p>
          <div class="a-our-team mt-4">
            <a class="btn-custom-lapor px-4">Read more</a>
          </div>
        </div>
        <div class="illustration-2">
          <img src="assets/image/undraw_people-search.png" class="img-fluid" alt="Illustration" style="height: 350px;">
        </div>
      </div>

      <div class="waves-icon">
        <img src="assets/image/Vector.png" class="img-fluid-border" alt="Illustration" style="height: 160px; margin-bottom: 4rem;">
      </div>
        
      <!-- Call to Action Section -->
<div class="cta-container">
  <h4>Ready to get started?</h4>
  <a href="#" class="cta-button">Register now!</a>
</div>

<!-- Footer Section -->
<footer class="footer">
  <div class="footer-content" style="margin-top: 50px;">
      <div class="footer-column">
          <h3>Get started</h3>
          <ul>
              <li><a href="#">Sign up</a></li>
              <li><a href="#">Sign in</a></li>
              <li><a href="#">Create account</a></li>
          </ul>
      </div>
      <div class="footer-column">
          <h3>Get help</h3>
          <ul>
              <li><a href="#">Reporting</a></li>
              <li><a href="#">Lost item</a></li>
              <li><a href="#">Found item</a></li>
          </ul>
      </div>
      <div class="footer-column">
          <h3>About us</h3>
          <ul>
              <li><a href="#our-team">Our Team</a></li>
          </ul>
      </div>
      <div class="footer-column">
          <h3>Partnership</h3>
          <ul>
              <li><a href="#">School organization</a></li>
              <li><a href="#">Student affairs section</a></li>
          </ul>
      </div>
  </div>

  <!-- Social Media & Logo -->
  <div class="footer-bottom">
      <div class="social-icons">
          <i class="fa-brands fa-square-instagram" style="color: #355aa9;"></i>
          <i class="fa-brands fa-x-twitter" style="color: #355aa9;"></i>
          <i class="fa-solid fa-envelope" style="color: #355aa9;"></i>
      </div>
      <div class="footer-logo">
          <img src="assets/image/Logo Locativy - Blue.png" alt="Locativy">
      </div>
  </div>
</footer>

    <script src="script.js"></script>
<!--     
    <footer class="text-center py-3 bg-dark text-white">
        <p>© 2025 Locativy. All Rights Reserved.</p>
    </footer> -->

</body>
</html>
