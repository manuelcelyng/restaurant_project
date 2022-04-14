<?php
	require_once "./controlador.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejemplo6 - PHP: Sesion</title>
</head>
<body>
	<header>
		<h1>Inicio</h1>

	</header>
	<section>
		<form action="action.php" method="get">
		<table border="1">
			<thead>
				<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = db::getDBConnection();
					$Respuesta = getCards();
					while ($Card = $Respuesta->fetch_assoc()) {
						print("<tr>");
							print("<td><input type='radio' name='card' value='".$Card['nombre']."'></td>");
							print("<td>".$Card['id']."</td>");
							print("<td>".$Card['nombre']."</td>");
							print("<td>".$Card['descripcion']."</td>");
							print("<td>".$Card['precio']."</td>");
							print("<td><img src='".$Card['imagen']."' width=150px></td>");
						print("</tr>");
					}
				?>
			</tbody>
		</table>
		<input type="submit" name="borrar" value="Borrar">
		<input type="submit" name="actualizar" value="Actualizar">
		<input type="submit" name="detalles" value="Detalles">
		<input type="submit" name="nuevo" value="Nuevo">
	</form>
	</section>


</body>
</html>