<?php

require_once __DIR__."./conexion.php";


function doQuery($consulta){ // funcion para ejecutar las consultas.
    $db = db::getDBConnection(); // obtengo la conexion la cual tiene la instancia de esta 
    print("holaaaa");
    return $db->query($consulta);  // devuelvo la consulta
}

function getCard($cardName){
    $consulta = "SELECT * FROM productos WHERE nombre='".$cardName."'"; // CONSULTA PARA TRAER SOLO UNA CARTA 
    return doQuery($consulta); 
}


function getCards(){ // obtengo todas las Cards
    $consulta = "SELECT * FROM productos";
    print($consulta."<br>");
    return doQuery($consulta);
}

function createCard($cardName,$desc,$precio,$imagen){ // Crear nuevo item
    $consulta = "INSERT INTO productos (nombre,descripcion,imagen,precio) VALUE("
        ."'".$cardName."', "
        ."'".$desc."', "
        ."'".$imagen."', "
        ."'".$precio."')";
        
    print($consulta."<br>");  
    return doQuery($consulta);
}


function updateCard($cardName,$newCardName,$desc,$precio,$imagen=""){
    if($imagen!=""){
        $consulta = "UPDATE productos SET "
        ."nombre='".$newCardName."',"
        ."descripcion='".$desc."',"
        ."imagen='".$imagen."',"
        ."precio='".$precio."' "
        ."WHERE nombre='".$cardName."'";
    }else { 
        $consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."',"
			."precio='".$precio."' "
			."WHERE nombre='".$cardName."'";
		}
    print($consulta."<br>");
    
    return doQuery($consulta);

}

?>