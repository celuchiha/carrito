<?php

class Connection{
	
	//variables para los datos de la base de datos
	public $server;
	public $userdb;
	public $passdb;
	public $dbname;
	
	public function __construct(){
		
		//Iniciar las variables con los datos de la base de datos
		$this->server = 'localhost';
		$this->userdb = 'root';
		$this->passdb = '74528075';
		$this->dbname = 'bd_carrito';
		
	}
	
	public function get_connected(){
		
		//Para conectarnos a MySQL
		$con = mysqli_connect($this->server, $this->userdb, $this->passdb);
		//Nos conectamos a la base de datos que vamos a usar
		mysqli_select_db( $con,$this->dbname);
		
	}
	
}

?>