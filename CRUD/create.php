<?php
	require_once "../controlador.php"; // llamo al controlador


	$origen  = $_FILES['imagen']['tmp_name']; // origen de donde viene la imagen
    print($origen);
	$destino = "images/".$_FILES['imagen']['name']; // en donde la voy a guardar, a partir de la ruta origen
    print("<br>");
    print($destino);
	print("<br>");

	//$db = db::getDBConnection(); // obtengo la conexion y la instancia de esta
	$Respuesta = createCard($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino); // obtengo la respuesta de la base de datos al crear el elemento
	if(!$Respuesta){ 
		print($Respuesta);
	}else {
        // este else es porque se hizo correctamente la creacion de  el item 
        //move_uploaded_file($origen, "../".$destino); // carga el archivo en la carpeta 
		header("Location: ../inicio.php");
	}
?>