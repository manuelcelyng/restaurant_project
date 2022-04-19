<?php

    require_once "./controlador.php"
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Delicious Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>

  <!-- =======================================================
  * Template Name: Delicious - v4.7.1
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
      <div class="tittle text-center">
        <br>
		    <h1>Delicious</h1>
        </div>
	
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bienvenidos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="menu.php">Menú</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="menu.php?categoria=Hamburguesas">Hamburguesas</a></li>
            <li><a class="dropdown-item" href="menu.php?categoria=Perros">Perros</a></li>
            <li><a class="dropdown-item" href="menu.php?categoria=Entradas">Entradas</a></li>
            <li><a class="dropdown-item" href="menu.php?categoria=Bebidas">Bebidas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href = "mapa.php">Ubicacion</a>
        </li>
      </ul>
      <form class="d-flex" action ="menu.php" method="get">
        <input class="form-control me-2" name="busqueda"type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <div class = "d-flex">
        <a class="nav-link" href="./logout.php">logout</a>
      </div>
      
    </div>
  </div>
</nav>
  
 

  

 

  <div id="principal">
    <div id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
          <li class="t1"><h3>Restaurantes</h3></li>
          <li class="nav-item" onclick="rest(0)"><a class="sidebar-nav-item">Centro Comercial Sandiego</a></li>
          <li class="nav-item" onclick="rest(1)"><a class="sidebar-nav-item">El Tesoro Shopping Park</a></li>
          <li class="nav-item" onclick="rest(2)"><a class="sidebar-nav-item">Centrocomercial Santafé</a></li>
          <li class="nav-item" onclick="rest(3)"><a class="sidebar-nav-item">San Lucas Plaza</a></li>
          <li class="nav-item" onclick="rest(4)"><a class="sidebar-nav-item">City Plaza Centro Comercial</a></li>
          <li class="nav-item" onclick="rest(5)"><a class="sidebar-nav-item">Florida parque comercial</a></li>
          <li class="nav-item" onclick="rest(6)"><a class="sidebar-nav-item">Centro Comercial Los Molinos</a></li>
          <li class="nav-item" onclick="rest(7)"><a class="sidebar-nav-item">Centro Comercial Viva Envigado</a></li>
      </ul>
    </div>
    <div id="mapa"></div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Delicious</h3>
      <p>Una comida bien preparada tiene sabores delicados que hay que retener en la boca para apreciarlos</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
       
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
