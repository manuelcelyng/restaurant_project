<?php
	//CRUD
   // la acciond e crear se hace en el inicio.php 

    //2 actualizar
    if(isset($_GET['actualizar'])){
        header("Location: inicio.php?card=".$_GET['card']);
    }

	// LEER UNA CARTA
	else if(isset($_GET['detalles'])){
		header("Location: CRUD/read.php?card=".$_GET['card']);
	}

	// BORRAR UNA CARTA
	else if(isset($_GET['borrar'])){
	
		header("Location: CRUD/delete.php?card=".$_GET['card']."&imagen=".$_GET['imagen']);
	}

	else {
		header("Location: inicio.php");
	}
?>