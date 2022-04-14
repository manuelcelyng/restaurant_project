<?php 
    require_once "./controlador.php";// se requiere el controlador porque llamare un metodo de esta
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content = "width=device-width,initial-scale=1">
    <title>UpdateItem</title>
</head>
<body>
    <header>
        <h1>Actualizar (UPDATE)</h1>
    </header>
    <?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró actualizar la tarjeta. Verifique la información</p>");
			}
		}
		?>

    <section>
    <form action="CRUD/update.php" enctype="multipart/form-data" method="POST">
			<?php
            
				$Respuesta = getCard($_GET['card']); // obtengto la card  para poner loa valores en el form
				while ($Card = $Respuesta->fetch_assoc()) {
				?>
        
            <!-- este label , se usa para pasar el nombre de la card que se va a actualizar POR ESO SE ESCONDE-->
            <label for ="name">
                <input type="text" name="card" value="<?php print($Card['nombre'])?>" required hidden>
            </label>

        
            <label for = "name">
                <span>Nombre</span>
                <input type="text" name= "nombre" value ="<?php print($Card['nombre']) ?>" required><br>
            </label>

            

            <label for = "lname">
                    <span>Descripcion</span>
                    <input type="text" name="descripcion" value="<?php print($Card['descripcion'])?>" required><br>
            </label>

            <label for = "lname">
                    <span>Precio</span>
                    <input type="number" name="precio" value="<?php print($Card['precio'])?>" required><br>
            </label>

            <img src="<?php print($Card['imagen'])?>" width=200>
			<label for="lname">Imagen:</label><br><input type="file" name="imagen"><br><br>
				<?php }?>
			
			
			
			<input type="submit" value="Actualizar">

		</form>
    </section>

</body>




<html>