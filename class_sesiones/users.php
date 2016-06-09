<?php

class Users{
	
	public $objDb;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	
	public function __construct(){
		
		$this->objDb = new Database();
		$this->objSe = new Sessions();
		
	}
	
	public function login_in(){
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="74528075"; // Mysql password 
$db_name="bd_carrito"; // base de datos 
$tbl_name="usuarios"; // nombre de la tabla
//session_start();



// Conectar el servidor y seleccion de base de datos.
$dbc = mysqli_connect($host, $username,$password, $db_name);
if(!$dbc){
echo "No se pudo conectar a la base de datos";
exit;
}
		
		$sql= mysqli_query ($dbc,"SELECT * FROM usuarios
		WHERE email = '".$_POST["email"]."' 
			AND Contraseña = '".$_POST["Contraseña"]."'");


	 $numrows = mysqli_num_rows ($sql);

	 if($numrows ==1){
			
			if($row=mysqli_fetch_array($sql)){
				
				$this->objSe->init();
                $this->objSe->set('email', $row["email"]);
				$this->objSe->set('Cod_Usuario', $row["Cod_Usuario"]);
								
header("Location:/carrito/inicio.php");		 						
				
			}
			
		}else {
		 
		 echo"<script type=\"text/javascript\">alert('Nombre de usuario o contrasena invalida!'); window.location='index.php';</script>";;
	   }
	}
}	


?>