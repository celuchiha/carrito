<?php 
require ('../phpmailer/class.phpmailer.php');
require ('../phpmailer/class.smtp.php');
include '../conexion.php';
	

 if ($_POST["action"] == "Comprar"){
	
	$Nombres=$_POST['Nombres'];
	$Apellidos=$_POST['Apellidos'];
	$Correo_Electrónico=$_POST['Correo_Electrónico'];
	$Direccion=$_POST['Direccion'];
	$Tarjeta=$_POST['Tarjeta'];
	$CodigoPostal=$_POST['CodigoPostal'];

			
	$asunto = "CarritoWeb.com";
	$mensaje = "Se ha realizado la compra con exito!!!, para el usuario $Nombres $Apellidos, espere su entrega en los proximos 15 dias \n Muchas Gracias!! ";
	//require "productos/phpmailer/class.phpmailer.php";
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure= "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "chechalara7@gmail.com";
	$mail->Password ='74528075';
	$mail->addAddress($Correo_Electrónico);
	$mail->Subject = $asunto;
	$mail->Body = $mensaje;
	if($mail->send()){
				
				
 echo "<script type=\"text/javascript\">alert('Se esta procesando su Compra, Espere correo de confirmacion!');history.go(-1);</script>";
 
  echo "<script type=\"text/javascript\">history.go(0);</script> ";		
				
	}else{ 
				
   echo "<script type=\"text/javascript\">alert('Error al procesar la compra!'); history.go(-1); </script>";
			
				
	} 
	}
	
	

	
 
	
	?>
    
	

