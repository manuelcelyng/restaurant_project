<?php
require_once "./controlador.php";

    


$Respuesta = getUser($_POST['user'],$_POST['pass']);

if (mysqli_num_rows($Respuesta)>0){
    $CUENTA= $Respuesta->fetch_assoc();
	session_start(); // inicio de sesion
	$_SESSION['user'] = $_POST['user']; // GUARDO EL USER DE LA SESION
    print($CUENTA['admin']);
    if($CUENTA['admin']){
        $_SESSION['auth'] = true; // le doy autorizacion
    }else{
        $_SESSION['auth'] = false; // le doy autorizacion
    }
    print($_SESSION['auth']);
	
	header("Location: inicio.php");
}else{
	print("Error<br>");
	header("Location: index.php?error=1");
}
$Respuesta->close();

?>