<?php
    require_once "../controlador.php";
    $destino = "";
    if(isset($_FILES['imagen']) && $_FILES['imagen']['name'] !=""){  

        $origen = $_FILES['imagen']['tmp_name'];
        $destino = "images/".$_POST['id'].$_FILES['imagen']['name'];
        move_uploaded_file($origen, "../".$destino);

        // ELIMINO DEL "SERVIDOR LA ANTERIOR IMAGEN" 
        if ( is_writable("../".$_POST['imagenAnterior']  ) ) { 
            unlink("../".$_POST['imagenAnterior'] ); 
        }
       
    }


    // para la respuesta se usa el controlador que es el encargado directo de la base de datos 
    $Respuesta = updateCard($_POST['card'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino);


    if(!$Respuesta){
        header("Location:../update.php?card=".$_POST['card']."&error=1");
    }
    else{
        header("Location: ../inicio.php");
    }
    


?>