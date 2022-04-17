<?php
	require_once "./controlador.php";

	comprobarSesion();
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejemplo6 - PHP: Sesion</title>
	<style>
		#entredaprueba {
			pointer-events: none;
			border:none;
		}
	</style>
</head>
<body>
	<header>
		<h1>Inicio</h1>

	</header>
	<section>
		<!--BOTON PARA CREAR UN NUEVO ELEMENTO-->
		<form action='action.php' method='get'>
			<input type="submit" name="nuevo" value="Nuevo">
		</form>

		<table border="1">
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
					$db = db::getDBConnection();
					$Respuesta = getCards();
					// en el while se crean todas los elementos con sus respectivos botones
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
							print("<td><input type='submit' name='borrar' value='Borrar'> <br>
							<input type='submit' name='actualizar' value='Actualizar'>    <br>
							<input type='submit' name='detalles' value='Detalles'>
							</td>");
							print("</form>");
						
						print("</tr>");
					}
				?>

			</tbody>
		</table>
		
	
	</section>


</body>
</html>