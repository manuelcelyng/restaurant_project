<?php

    require_once "./controlador.php";
    session_start();
    $sesionauth = "";
	if(isset($_SESSION['auth'])){
		if($_SESSION['auth'] == 1){
            $sesionauth =1;
	}}
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    
    <style>
        body {
            background-image:url("");
            background-repeat: repeat;
        }
        h1 { 
            color: black;
        }

        .grid-fluid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 1rem;
        grid-auto-rows: minmax(100px, auto);
        align-self: center;
    }
    .card {
        margin: 2rem auto;
        border:none;
        border-radius: 10px;
        box-shadow: 0 2px 9px 0 rgba(0, 0, 0, 0.1);
    }
    .card:hover {
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.4);
    }
    .card-text {
        font-size: 1.2rem;
        color: rgb(82, 82, 100);
    }

    .hero-title{
        margin: 0 2rem;
        font-weight: bold;
        font-size: 2.5rem;
        -webkit-text-stroke: 1px #E09D21;
        color: white;
        
        
    }
    .hero-no-result {
        background-image: url("./image/fondo_menu.webp");
        height: 50%;
    }


    </style>

   
</head>



<body>
    

        <div class="tittle text-center">
            <br>
		    <h1>Menú</h1>
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
        <?php 
            if($sesionauth ==1){?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.php">CRUD</a>
                    </li>
                
            <?php }

        ?>
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
        <?php 
            if($sesionauth ==""){?>
                <li class="nav-item">
                 <a class="nav-link" href = "mapa.php">Ubicacion</a>
                </li>
            <?php }
        ?>
        
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



	<div class="grid-fluid container">
					
		<?php
            $obtener = "todos";
            // aca voy a ver si se eligio una categoria
            if(isset($_GET['categoria'])){
                $obtener = $_GET['categoria'];
                if($obtener!="todos"){
                $Respuesta = getCardsByCategoria($obtener);
                }
            }
            else if(isset($_GET['busqueda'])){
                $obtener = $_GET['busqueda'];
                $Respuesta =  getCardBysearch($obtener);
            }
            if($obtener=="todos"){
                $Respuesta = getCards();
            }

            if(mysqli_num_rows($Respuesta)>0){
    		// en el while se crean todas los elementos con sus respectivos botones
			while ($Card = $Respuesta->fetch_assoc()) { 
            
                print("<div class='card' style='width: 18rem;'>");
                    print("<img class='card-img-top' src='".$Card['imagen']."' alt='Card image cap'>");
                    print("<div class='card-body'>");
                        print("<li class='list-group-item'><ul class=list-group list-group-flush>");
                        print("<li class='list-group-item'><h5 class='card-title'>".$Card['nombre']."</h5></li>");
                        print("<li class='list-group-item'><p class='card-text'>".$Card['descripcion']."</p></li>");
                        print("<li class='list-group-item'><p class='card-text'> Precio: ".$Card['precio']."</p></li>");
                        print("</ul>");
                    print("</div>");
                print("</div>");
           
			}}

            if(mysqli_num_rows($Respuesta)<=0){
                print("</div>");
                print("<div class ='hero-no-result'>");
                    print("<p2 class='hero-title'>No se encontraron resultados </p2>");
                print("</div>");
            }
            else{
                print("</div>");
            }

    ?>


    


    


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


<!-- MODALES-->

<!-- Button to trigger modal -->















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