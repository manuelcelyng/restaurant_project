<?php
	//CRUD
	//1. Create
	if (isset($_GET['nuevo'])) {
		header("Location: create.php");
	}

    //2 actualizar
    else if(isset($_GET['actualizar'])){
        header("Location: update.php?card=".$_GET['card']);
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