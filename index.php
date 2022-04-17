<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>InicioSesion</title>
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>
<body>
	<h1>Iniciar sesion</h1>
	<form action="login.php" method="post">
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>Verificar datos</p>");
			}else if($_GET['error']==2){
				print("<p class='error'>Debe iniciar sesion como administrador</p>");
			}
		}
		?>
		<label>Nombre</label><input type="text" name="user" required>
		<label>Contraseña</label><input type="password" name="pass" required><br><br>

		<input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>