<?php
include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $item = htmlspecialchars($_POST["item"]);
    $specification = htmlspecialchars($_POST["specification"]);
    $quantity = htmlspecialchars($_POST["quantity"]);
    $location = htmlspecialchars($_POST["location"]);
    $time_found = htmlspecialchars($_POST["time_found"]);
    $type_report = htmlspecialchars($_POST["type_report"]);
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $upload_dir = "uploads/";
    $file_path = $upload_dir . basename($file_name);

    // Ensure the uploads directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move uploaded file to the uploads directory
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Insert data into the database
        $sql = "INSERT INTO tb_reports (username, item, specification, quantity, location, time_found, type_report, file_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $username, $item, $specification, $quantity, $location, $time_found, $type_report, $file_path);

        if ($stmt->execute()) {
            $message = "<div class='alert alert-success'>Data successfully inserted</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='alert alert-danger'>Failed to upload file</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locativy - Form Report Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/form-report.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
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
                        <li class="nav-item"><a class="nav-link" href="https://gmeqx7bp.chat.qbusiness.us-west-2.on.aws/#/chat/a7c4ae44-93d0-4564-88d1-1f18c77f1984">Chat with Ai</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Items</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="lost-item.php">Lost item</a></li>
                                <li><a class="dropdown-item" href="found-item.php">Found items</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="aboutus.html">About Us</a></li>
                    </ul>
                    <div class="button">
                        <a class="login-button" type="submit" href="report.php">Lapor!</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="content" style="margin-top: 6rem; margin-bottom: 3rem;">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #355aa9;">
                <h4 class="card-title">Form Report Item</h4>
              </div>


    <div class="container" style="margin: 2rem 2rem 2rem 2rem; padding-right: 4rem; background-color:transparent">
        <?php if ($message) echo $message; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="item" class="form-label"><b>Item</b></label>
                <input type="text" class="form-control" id="item" name="item" placeholder="Enter name of item" required>
            </div>
            <div class="mb-3">
                <label for="specification" class="form-label"><b>Specification</b></label>
                <input type="text" class="form-control" id="specification" name="specification" placeholder="Enter the item specification" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label"><b>Quantity</b></label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter the quantity" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label"><b>Location</b></label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter the location" required>
            </div>
            <div class="mb-3">
                <label for="time_found" class="form-label"><b>Time Found</b></label>
                <input type="datetime-local" class="form-control" id="time_found" name="time_found" required>
            </div>
            <div class="mb-3">
                <label for="type_report" class="form-label"><b>Type Report</b></label>
                <select class="form-control" id="type_report" name="type_report" required>
                    <option value="">-- Choose type report --</option>
                    <option value="Found Item">Found Item</option>
                    <option value="Lost Item">Lost Item</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label"><b>Upload File</b></label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color : #355aa9">Submit</button>
        </form>
    </div>
    </section>
<!-- Footer Section -->
<footer class="footer" style="margin-top: 10rem;">
  <div class="footer-content" style="margin-top: 5px;">
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
        <a href="https://www.instagram.com/locativy?igsh=bnk4ZHd1aXB1a2E4"><i class="fa-brands fa-square-instagram" style="color: #355aa9;"></i></a>
          <i class="fa-brands fa-x-twitter" style="color: #355aa9;"></i>xml_error_string
          <i class="fa-solid fa-envelope" style="color: #355aa9;"></i>
      </div>
      <div class="footer-logo">
          <img src="assets/image/Logo Locativy - Blue.png" alt="Locativy">
      </div>
  </div>
</footer>

</body>
</html>