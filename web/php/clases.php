<?php

class mysql{
	
	//declaramos una variable para conexión
 
	public $conexion;
	 
	//Declaramos el constructor de la clase
	 
	public function __construct($host, $usuario, $clave, $db){
		$this->conexion = new mysqli($host, $usuario, $clave);
		 
	}
	 
	
	
	
	
	public function insertar($tabla, $camposdatos) {
		 //separamos los datos por si son varios
		 
		$campo = implode(", ", array_keys($camposdatos));
		 
		$i=0;
		foreach($camposdatos as $indice=>$valor) {
		 
		$dato[$i] = "'".$valor."'";
		$i++;
		 
		}
		 
		$datos = implode(", ",$dato);
		 
		  //Insertamos los valores en cada campo
		 
		$this->connection->query("INSERT INTO $tabla ($indice) VALUES ($dato)") ;
	}

}



?>