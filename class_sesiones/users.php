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
		
		$query = "SELECT * FROM usuarios
		WHERE email = '".$_POST["email"]."' 
			AND Contraseña = '".$_POST["Contraseña"]."'";
		$this->result = $this->objDb->select($query);
		$this->rows = mysqli_num_rows($this->result);
		if($this->rows > 0){
			
			if($row=mysqli_fetch_array($this->result)){
				
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