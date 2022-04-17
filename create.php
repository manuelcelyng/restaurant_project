<?php
	require_once "./controlador.php";
	comprobarSesion();
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CreaNewItem</title>
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>
<body>
	<header>
		<h1>Nuevo (CREATE)</h1>
	</header>
	<section>
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró guardar el nuevo item. Verifique la información, no puede crear un nuevo item con el mismo nombre de otro.</p>");
			}
		}
		?>

		<form action="CRUD/create.php" enctype="multipart/form-data" method="POST">
			<label for="name">Nombre:</label><br><input type="text" name="nombre" required><br>
			<label for="lname">Descripcion:</label><br><input type="text" name="descripcion" required><br>
			<label for="lname">Precio:</label><br><input type="number" name="precio" required><br>
			<label for="lname">Imagen:</label><br><input type="file" name="imagen" required><br><br>
			<label for="categorias">Categoria: </label>
			<select name="select" id="categorias" required>
				<option value="">none</option>
  				<option value="Hamburguesas">Hamburguesas</option>
  				<option value="Bebidas">Bebidas</option>
  				<option value="Perros">Perros</option>
				<option value="Entradas">Entradas</option>
			</select>
			<br><br>
			<input type="submit" value="Insertar">
		</form>
	</section>


</body>
</html>