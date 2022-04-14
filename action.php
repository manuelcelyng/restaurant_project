<?php
	//CRUD
	//1. Create
	if (isset($_GET['nuevo'])) {
	    print("nuevo action: ".$_GET['card']);
		header("Location: create.php");
	}

    //2 actualizar
    else if(isset($_GET['actualizar'])){
        header("Location: update.php?card=".$_GET['card']);
    }

	else {
		header("Location: inicio.php");
	}
?>