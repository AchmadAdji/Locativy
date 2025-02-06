<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locativy - Form Report Item</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/item-lost.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
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
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Message</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  Items
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Lost item</a></li>
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

    <section class="content" style="margin-top: 1rem;">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Form Report Item</h4>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput" style="font-weight: 500;">Username</label>
                    <input type="text" class="form-control" id="exampleInput1" placeholder="Enter Your Username">
                  </div><br>

                  <div class="form-group">
                    <label for="exampleInput" style="font-weight: 500;">Item</label>
                    <input type="text" class="form-control" id="exampleInput2" placeholder="Enter Name Of Item">
                  </div><br>
                  
                  <div class="form-group">
                    <label for="exampleSelect" style="font-weight: 500;">Type Report</label>
                    <select class="form-control" id="exampleSelect">
                      <option value="">-- Choose type report --</option>
                      <option value="item1">Found Item</option>
                      <option value="item2">Lost Item</option>
                    </select>
                  </div><br>
                  
                  <div class="form-group">
                    <label for="exampleInputFile" style="font-weight: 500;">Upload File</label>
                    <input type="file" class="form-control-file" id="exampleInputFile">
                  </div><br>
                  <button type="submit" class="btn btn-primary">Submit</button>                  
                </div>
                <!-- /.card-body -->
              </form>
            </div>
    
</body>
</html>