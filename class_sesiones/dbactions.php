<?php

class Database{
	
	public $result;
	
	public function __construct(){ }
	
	

    public function select($query){
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="74528075"; // Mysql password 
$db_name="bd_carrito"; // base de datos 
$tbl_name="usuarios"; // nombre de la tabla

// Conectar el servidor y seleccion de base de datos.
$dbc = mysqli_connect($host, $username,$password, $db_name);
if(!$dbc){
echo "No se pudo conectar a la base de datos";
exit; 
}

		return $this->result = mysqli_query($dbc,$query);
	}
	
}


?>