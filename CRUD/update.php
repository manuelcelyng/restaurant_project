<?php
    require_once "../controlador.php";
    $destino = "";
    if(isset($_FILES['imagen']) && $_FILES['imagen']['name'] !=""){ // compruebo que venga una imagen nueva
        $origen = $_FILES['imagen']['tmp_name'];
        $destino = "images/".$_FILES['imagen']['name'];
    }

    // para la respuesta se usa el controlador que es el encargado directo de la base de datos 
    $Respuesta = updateCard($_POST['card'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino);

    if(!Respuesta){
        header("Location: ../update.php? card = ".$_POST['nombre']."&error=1");
    }
    else{
        move_uploaded_file($origen, "../".$destino);
        header("Location: ../inicio.php");
    }

?>