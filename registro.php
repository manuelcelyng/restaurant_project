<?php

	require_once "./controlador.php";

	function createUser($nameUser,$password,$email){
		$consulta = "INSERT INTO usuarios (nombre,password,email) VALUE("
			."'".$nameUser."', "
			."'".$password."', "
			."'".$email."')";
			
		return doquery($consulta);
	}


	if(isset($_POST['user'])!= ""){
		$Respuesta =  createUser($_POST['user'],$_POST['pass'], $_POST['email']);
		if(!$Respuesta){
			header("Location: registro.php?error=1");
		}
		else{
			header("Location: index.php");
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	

	<link href="assets/css/style.css" rel="stylesheet">
	<style>
		#cuadroSesion{
			display: flex;
  			justify-content: center;
  			align-items: center; height:400px;
		
		}

		form{
			width: 35%;
		}
		#divRe:hover{
			box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.4);
		}

		p.mensaje{
			color: #4EA454;
			font-size:150%;
			margin-top: 5%;
			width: 100%;
			
			
		}
		#divRe{
			margin-top:20%;
			border-radius:10px;
			border:solid ;
			width: 100%;
			text-align: center;
			padding-bottom:5%;
		}
		.inputSesion{
			width: 90%;
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








	<?php
		if(isset($_GET['error'])){

			if($_GET['error']==1){
				print("<p><span>Verifique los campos </span></p>");
			}
		}
	?>

	<section id="cuadroSesion">
	
	<form action="registro.php" method="post" id="formu-reg">
		<div id="divRe">
		<a class="nav-link" href="./index.php">Iniciar Sesion</a>
		<p class = "mensaje">Registro</p>	
		<label>Nombre:	</label><br><input type="text" class ="inputSesion"  name="user" id="nombre-reg"><br><br>
		<label>Contraseña:	</label><br><input type="password" class ="inputSesion"   name="pass" id="pass-reg"><br><br>
		<label>Correo:	</label><br><input type="email" class ="inputSesion"  name="email" id="email-reg"><br><br>
		<input class="btn btn-outline-success"  type="submit" name="CrearUser" value="Enviar">
		<br><br>
		<span id="formError-reg"></span>
	</div>
	</form>
	</section>






	<!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>


