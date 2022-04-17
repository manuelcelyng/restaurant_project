<?php
// incluimos el controlador 
    require_once "../controlador.php";
    comprobarSesion();
    // probamos la sesion 


    // vamos a hacer el llamado
    if(isset($_GET['card'])){
         // primero leemos la card a eliminar para poder eliminar imagen del "servidor"  
        $Respuesta =  deleteCard($_GET['card']); // mando a borrar de la base de datos
        if(!$Respuesta){
            header("Location: ../inicio.php?error=1");
        }
        else{
            // ME ENCARGO DE TAMBIEN BORRAR LA IMAGEN DE SERVIDOR , SI SE LOGRA PRIMERO BORRAR DE LA BD
            if ( is_writable("../".$_GET['imagen']  ) ) { 
                unlink("../".$_GET['imagen'] ); 
            }

            header("Location: ../inicio.php");
        }
    }

    




?>