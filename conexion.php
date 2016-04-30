
	<?php /*?>$server="localhost";
	$username="root";
	$password="74528075";
	$db='bd_carrito';
	$con=mysqli_connect($server,$username,$password)or die("no se ha podido establecer la conexion");
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");<?php */?>
	<?php
$hostname_root = "localhost";
$database_root = "bd_carrito";
$username_root = "root";
$password_root = "74528075";
$mysqli = mysqli_connect($hostname_root, $username_root, $password_root) or trigger_error(mysql_error(),E_USER_ERROR); 
$select_db = mysqli_select_db($mysqli,$database_root) or trigger_error(mysql_error(),E_USER_ERROR);
?>