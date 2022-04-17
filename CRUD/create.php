<?php
	require_once "../controlador.php"; // llamo al controlador
	comprobarSesion();
	$origen  = $_FILES['imagen']['tmp_name']; // origen de donde viene la imagen
	$destino ="";
	//$db = db::getDBConnection(); // obtengo la conexion y la instancia de esta
	$respuesta = createCard($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino,$_POST['select']); // obtengo la respuesta de la base de datos al crear el elemento
	if($respuesta){
		$Respuesta  = getCard($_POST['nombre']);
		while($card =$Respuesta->fetch_assoc() ){
		// guardamos la imagen con id
		$destino = "images/".$card['id'].$_FILES['imagen']['name'];
		}

		$Respuesta = updateCard($_POST['nombre'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino,$_POST['select']);
		// este else es porque se hizo correctamente la creacion de  el item 
    	move_uploaded_file($origen, "../".$destino); // carga el archivo en la carpeta 
		header("Location: ../inicio.php");

	}
	else{
		header("Location: ../create.php?error=1");
	}

	// obtengo el item creado para usar el ID en la creacion de la imagen
	

?>