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
</head>
<body>
	<?php
		if(isset($_GET['error'])){

			if($_GET['error']==1){
				print("<p><span>Verifique los campos </span></p>");
			}
		}
	?>
	<h1>Formulario</h1>
	<form action="registro.php" method="post">
		<label>Nombre:	</label><input type="text" name="user" required><br><br>
		<label>Contraseña:	</label><input type="password" name="pass" required><br><br>
		<label>Correo:	</label><input type="email" name="email" required><br><br>
		<input type="submit" name="CrearUser" value="Enviar">
	</form>
</body>
</html>


