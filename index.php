<?php 
	require_once "./controlador.php";
	// comprueba si hay una sesion habierta
	session_start();
	if(isset($_SESSION['auth'])){
		if($_SESSION['auth'] == 0){
		header("Location: menu.php");
		}
        else if ($_SESSION['auth'] == 1){
            header("Location: inicio.php");
        }
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>InicioSesion</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	

	<link href="assets/css/style.css" rel="stylesheet">

	<style>
		#formSesion{
			width:35%;
			border-radius:10px;
			border:solid #4EA454;
			text-align:center;height:400px;
		}
		#formSesion:hover{
			box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.4);
		}

		#cuadroSesion{
			display: flex;
  			justify-content: center;
  			align-items: center; height:400px;
		}
		p.error{
			color:red;
			margin-top: 15%;
			margin-bottom: -15%;
		}
		.inputSesion{
			width: 90%;
		}
		p.mensaje{
			color: #4EA454;
			font-size:40px;
			margin-top: 5%;
			margin-bottom: -15%;
		}

</style>


</head>
<body>
<div class="tittle text-center">
            <br>
		    <h1>Bienvenido!</h1>
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

	  
      
    </div>
  </div>
</nav>

<br>
<section id="cuadroSesion">

	<form id="formSesion" action="login.php" method="post" >
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>Verificar datos</p><br>");
			}else if($_GET['error']==2){
				print("<p class='error'>Debe iniciar sesion como administrador</p><br>");
			}
		}
		else{
			print("<a class='nav-link' href='./registro.php'>Registrarse</a>");
			print("<p class='mensaje'>Iniciar Sesion</p><br>");
		}
		
		?>
	
		<div style="margin-top:25%;" >
		<label class="labelSesion">Nombre: </label><br><input class="inputSesion" type="text" name="user" required><br>
		</div>

		<div >
		<label class="labelSesion">Contraseña:</label><br><input type="password" class="inputSesion" name="pass" required><br>
		</div>
		<br>
		<div>
		<input class="btn btn-outline-success" type="submit" name="enviar" value="Login">
		</div>
	
	</form>

</section>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>