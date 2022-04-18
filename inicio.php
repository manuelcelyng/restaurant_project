<?php
	require_once "./controlador.php";

	comprobarSesion();
	
?>

<!DOCTYPE html>
<html>
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
  
  <script type="text/javascript"  src="assets/js/myscript.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



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
		    <h1>Menú CRUD</h1>
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
          <a class="nav-link active" aria-current="page" href="inicio.php">Ver todos</a>
        </li>
		<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="menu.php">Ver menú como usuario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="inicio.php?categoria=Hamburguesas">Hamburguesas</a></li>
            <li><a class="dropdown-item" href="inicio.php?categoria=Perros">Perros</a></li>
            <li><a class="dropdown-item" href="inicio.php?categoria=Entradas">Entradas</a></li>
            <li><a class="dropdown-item" href="inicio.php?categoria=Bebidas">Bebidas</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" action ="inicio.php" method="get">
        <input class="form-control me-2" name="busqueda"type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <div class = "d-flex">
        <a class="nav-link" href="./logout.php">logout</a>
      </div>
      
    </div>
  </div>
</nav>








<div class ="container-boton-create">
	<form action='inicio.php' method='get'>
		<input class= 'btn btn-outline-success' type="submit" name="nuevo" value="Nuevo">
	</form>

</div>


<!-----------------------------------------------------------------------------> 
	<section>
				
		

		<table class="table" border="1">
			<thead>
				<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Categoria</th>
				<th>Imagen</th>
				<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
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
					}?>
				
				
					<?php
					while ($Card = $Respuesta->fetch_assoc()) {
						print("<tr>");
							print("<form action='action.php' method='get'>");
							print("<input type='text' name='card' value='".$Card['nombre']."' hidden>");
							print("<input type='text' name='imagen' value='".$Card['imagen']."' hidden>");
							print("<td>".$Card['id']."</td>");
							print("<td>".$Card['nombre']."</td>");
							print("<td>".$Card['descripcion']."</td>");
							print("<td>".$Card['precio']."</td>");
							print("<td>".$Card['categoria']."</td>");
							print("<td><img src='".$Card['imagen']."' width=150px></td>");
							print("<td><input type='submit' class= 'btn btn-outline-danger' name='borrar' value='Borrar'> <br>
							<input type='submit' class= 'btn btn-outline-primary' name='actualizar' value='Actualizar'>  
							</td>");
							print("</form>");
						
						print("</tr>");
					}?>


					
						

			</tbody>
		</table>
		
	
	</section>

<!--SECCION DE MODALES ESTOS SE CREAN PARA NO USAR OTRO ARCHIVO-->
<!-- MODAL DE CREAR -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  id="botonModal" hidden = "true"></button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botonModalCrear" hidden ="true"></button>
<!--Modal de CREAR-->
<?php
	if(isset($_GET['nuevo'])) { ?>
	  		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="CRUD/create.php" enctype="multipart/form-data" method="POST">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == '1'){
						print("<p style='color:red;'> Ha ocurrido un error </p>");
					}
				}
			?>
			<label for="name">Nombre:</label><br><input type="text" name="nombre" required><br>
			<label for="lname">Descripcion:</label><br><input type="text" name="descripcion" required><br>
			<label for="lname">Precio:</label><br><input type="number" name="precio" required><br>
			<label for="lname">Imagen:</label><br><input id="seleccionArchivos" accept="image/*" type="file" name="imagen" required><br><br>
			<label for="categorias">Categoria: </label>
			<select name="select" id="categorias" required>
				<option value="">none</option>
  				<option value="Hamburguesas">Hamburguesas</option>
  				<option value="Bebidas">Bebidas</option>
  				<option value="Perros">Perros</option>
				<option value="Entradas">Entradas</option>
			</select>
			<br><br>
			<img id="imagenPrevisualizacion" width=200>
			<br>
      </div>
      <div class="modal-footer">
	  	<input type="submit" value="Insertar">
      </div>
	  </form>
    </div>
  </div>
</div>
<?php
	} ?>



<!--MODAL DE ACTUALIZAR -->
<?php
	if(isset($_GET['card'])){?>
		<?php
	  
	  $Respuesta = getCard($_GET['card']); // obtengto la card  para poner loa valores en el form
	  while ($Card = $Respuesta->fetch_assoc()) {
	  ?>


	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <?php
				if(isset($_GET['error'])){
					if($_GET['error'] == '1'){
						print("<p style='color:red;'> Ha ocurrido un error </p>");
					}
				}
			?>
	  <form action="CRUD/update.php" enctype="multipart/form-data" method="POST">
	  <!-- este label , se usa para pasar el nombre de la card que se va a actualizar POR ESO SE ESCONDE-->
	  <label for ="name" hidden>
		  <input type="text" name="card" value="<?php print($Card['nombre'])?>" required hidden>
	  </label >
	  
  
	  <label for = "name">
		  <span>Nombre:</span><br>
		  <input type="text" name= "nombre" value ="<?php print($Card['nombre']) ?>" required>
	  </label>

	  <br>

	  <label for = "lname">
			  <span>Descripcion:</span><br>
			  <input type="text" name="descripcion" value="<?php print($Card['descripcion'])?>" required>
	  </label>

	  <br>

	  <label for = "lname">
			  <span>Precio:</span><br>
			  <input type="number" name="precio" value="<?php print($Card['precio'])?>" required><br>
	  </label>
	  <br>
	  <label for="categorias">Categoria:</label><br>
	  <select name="select" id="categorias" required>
		  <option  selected value="<?php print($Card['categoria'])?>"><?php print($Card['categoria'])?></option>
		  <?php 
			  $opciones = array("Hamburguesas","Bebidas","Perros","Entradas");
			  
			  foreach ($opciones as $opcion) {
				  if($opcion != $Card['categoria']){
					  print("<option value=".$opcion.">".$opcion."</option>");
				  }
			  }
		  ?>
	  </select>

	  <br><br>

	  <!--AGREGO ESTE INPUT PARA TENER EL NAME DE LA IMAGEN anterior, y borrarla-->
	  <input type="text" name="imagenAnterior" value="<?php print($Card['imagen'])?>" hidden>
	  <!-- le mando el ID para actualizar la imagen con la nueva que se ponga-->
	  <input type="text" name="id" value="<?php print($Card['id'])?>" hidden>
	  <img src="<?php print($Card['imagen'])?>" width=200><br><br>
	  <label for="lname">Imagen:</label><input type="file" name="imagen"><br><br>
		  <?php }?>
	  
	  
	<input type="submit" value="Actualizar">
	 

  </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


	<?php }?>





<!--boton para actualizar-->
<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->












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
  


</body>
</html>