<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registro</title>
</head>
<body>
	<h1>Formulario</h1>
	<form action="registro.php" method="post" enctype="multipart/form-data">
		<label>Nombre</label><input type="text" name="user" required>
		<label>Contraseña</label><input type="password" name="pass" required><br><br>

		<label>Archivo</label><input type="file" name="arch1"><br><br>
		<label>Archivo</label><input type="file" name="arch2"><br><br>
		<label>Archivo</label><input type="file" name="arch3"><br><br>

		<input type="submit" name="enviar" value="Enviar">
	</form>


    <h3>FILES</h3>
	<?php
	/*
	$_FILES[file][propiedades]

	$_FILES[arch1][name,type,tmp_name,err,size]
	$_FILES[arch2][name,type,tmp_name,err,size]
	$_FILES[arch3][name,type,tmp_name,err,size]

	$_FILES[
		arch1 => [name:"", type:"", tmp_name:"", err: ,size:""]
		arch2 => [name:"", type:"", tmp_name:"", err: ,size:""]
		arch3 => [name:"", type:"", tmp_name:"", err: ,size:""]
	]
	*/
	print($_FILES['arch1']['name']."<br>");
	print($_FILES['arch1']['type']."<br>");

	#$cont = 0;
	foreach ($_FILES as $vbleName => $file) {
		print($vbleName."<br>");
		foreach ($file as $prop => $value) {
			print("   ".$prop." => ".$value."<br>");
		}
		print("<br>");
		#$file = $_FILES['arch1']
		if($file['error']==0){
			#$cont++;
			#$destino = "archivo".$cont.".jpg"; 
			$origen  = $file['tmp_name']; // nos da la ruta origen 
			$destino = "images/".$file['name'];
			move_uploaded_file($origen, $destino);
		}
	}
	?>
</body>
</html>


