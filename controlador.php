<?php
//configuracion , define() se usa para crear una variable constante en PHP
define("HOST", "localhost"); // hosting
define("USER", "root"); // User de la bd
define("PASS", "");
define("DBNAME", "menu"); // nombre de la base de daros
define("PORT", 3306); // puerto por el que se conecta a base de datos

class DB extends mysqli{ // clase que extiende de mysqli la cual se encarga de la conexion a la DB
	protected static $instance; // variable estatica para la conexion

	public function __construct($host,$user,$pass,$dbname,$port) { // constructor de la clase
        mysqli_report(MYSQLI_REPORT_OFF);
        @parent::__construct($host,$user,$pass,$dbname,$port); // LLAMA A mysqli y le pasa los argumentos
        if( mysqli_connect_errno() ) { // por si ocurre un error
            throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }

    }

	public static function getDBConnection(){ // funcion estatica para la conexion
		if( !self::$instance ) {// se pregunta si instance ya tiene valor
            self::$instance = new self(HOST,USER,PASS,DBNAME,PORT); // se crea la conexion y se guarda en instance
            $consulta = "SET CHARACTER SET UTF8";
			self::$instance->query($consulta);
        }
        return self::$instance;		// se retorna la conexion
	}
	
}