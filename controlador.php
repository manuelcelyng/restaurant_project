<?php

require_once __DIR__."./conexion.php";


function doQuery($consulta){ // funcion para ejecutar las consultas.
    $db = db::getDBConnection(); // obtengo la conexion la cual tiene la instancia de esta 
    return $db->query($consulta);  // devuelvo la consulta
}


function getUser($name,$pass){
    $consulta = "SELECT * FROM usuarios WHERE nombre='".$name."' AND password='".$pass."'";
    print($consulta."<br>");
    return doQuery($consulta);
}

// obtiene un item , por su nombre, dado que el nombre es unico en la BD
function getCard($cardName){
    $consulta = "SELECT * FROM productos WHERE nombre='".$cardName."'"; // CONSULTA PARA TRAER SOLO UNA CARTA 
    return doQuery($consulta); 
}

// trae todos los items de la base de datos
function getCards(){ // obtengo todas las Cards
    $consulta = "SELECT * FROM productos";
    return doQuery($consulta);
}

// CREA UNA CARTA 
function createCard($cardName,$desc,$precio,$imagen,$categoria){ // Crear nuevo item
    $consulta = "INSERT INTO productos (nombre,descripcion,imagen,precio,categoria) VALUE("
        ."'".$cardName."', "
        ."'".$desc."', "
        ."'".$imagen."', "
        ."'".$precio."',"
        ."'".$categoria."')";
        
    return doQuery($consulta);
}

// ACTUALIZA UNA CARTA, HAY QUE PASARLE EL NAME ANTERIOR PARA HACER LA CONSULTA.
function updateCard($cardName,$newCardName,$desc,$precio,$imagen="",$categoria){
    if($imagen!=""){
        $consulta = "UPDATE productos SET "
        ."nombre='".$newCardName."',"
        ."descripcion='".$desc."',"
        ."imagen='".$imagen."',"
        ."precio='".$precio."', "
        ."categoria='".$categoria."' "
        ."WHERE nombre='".$cardName."'";
    }else { 
        $consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."',"
			."precio='".$precio."',"
            ."categoria='".$categoria."' "
			."WHERE nombre='".$cardName."'";
		}

    
    return doQuery($consulta);



}
// funcion , creacion consulta eliminacion de la base de datos
function deleteCard($cardName){
    $consulta =  "DELETE FROM productos WHERE nombre='".$cardName."'";
    return doQuery($consulta);
}

function comprobarSesion(){
	session_start();
	if(isset($_SESSION['auth'])){
		if($_SESSION['auth'] == 0){
		header("Location: menu.php");
		}
       
	}
	else{
		header("Location: index.php?error=2");
	}
}


function getCardsByCategoria($categoria){
    $consulta = "SELECT * FROM productos WHERE categoria='".$categoria."'"; // solo productos de la misma categoria 
    return doQuery($consulta);
}

function getCardBysearch($name){
    $consulta = "SELECT * FROM productos WHERE nombre LIKE '%".$name."%'";
    return doQuery($consulta);
}






?>