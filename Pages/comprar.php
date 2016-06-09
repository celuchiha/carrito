<?php
	session_start();
	include '../conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						$re=mysqli_query($mysqli,"select * from productos where Cod_producto=".$_GET['id'])or die(mysql_error());
						while ($f=mysqli_fetch_array($re)) {
							$nombre=$f['Nombre'];
							$precio=$f['Precio'];
							$imagen=$f['Imagen'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'nombre'=>$nombre,
										'precio'=>$precio,
										'imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysqli_query($mysqli,"select * from productos where Cod_producto=".$_GET['id'])or die(mysql_error());
			while ($f=mysqli_fetch_array($re)) {
				$nombre=$f['Nombre'];
				$precio=$f['Precio'];
				$imagen=$f['Imagen'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'nombre'=>$nombre,
							'precio'=>$precio,
							'imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1 align="center">Detalles de la compra</h1>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
						<img src="../productos/<?php echo $datos[$i]['imagen'];?>"><br>
						<span><?php echo $datos[$i]['nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['precio'];?></span><br>
						<span>Cantidad: <input type="text" readonly value="<?php echo $datos[$i]['Cantidad'];?>"></span><br>
						<span>Subtotal:$<?php echo $datos[$i]['Cantidad']*$datos[$i]['precio'];?></span><br>
						
					</center>
				</div>
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has a&ntilde;adido ningun producto</h2></center>';
			}
			echo '<center><h2>Total: $'.$total.'</h2></center>';
		
		?>
		<?php /*?><h1>A&ntilde;adir Usuario</h1>
 <form action="../Validaciones/input2.php" method="post" name="form1" id="form1">
      <table align="center">
     
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Nombres:</td>
          <td><input type="text" required="required" name="Nombres" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Apellidos:</td>
          <td><input type="text" required="required" name="Apellidos" value="" size="32" /></td>
        </tr>
       <tr valign="baseline">
          <td nowrap="nowrap" align="right">Correo Institucional:</td>
          <td><input type="text" required="required" name="Correo_Institucional" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">ContraseÃ±a:</td>
          <td><input type="text" required="required" name="ContraseÃ±a" value="" size="32" /></td>
        </tr>
        <?php 
		
		//consulta a la bd sobre los tipos de usuarios 
		
         $queryitem = "SELECT *
		FROM
        `tipo_usuarios`;";
		$result = mysqli_query($mysqli,$queryitem);		
		   	
		?>		
		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Tipo de Usuario:</td>
          <td> <select required="required" name="Cod_Tipo_Usuario">
        <option value="">Elija un tipo de Usuario</option>
        <?php
		
		//mostrar el valor del registro de la segunda columna de la tabla 
		
		while ($fila=mysqli_fetch_row($result)){
		echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Unidad:</td>
          <td><input type="text" required="required" name="Unidad" value="" size="32" /></td>
        </tr>
        <p>
        <br />
        <?php 
		
		//consulta a la bd sobre los procesos
		
         $queryitem = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result = mysqli_query($mysqli,$queryitem);		
		   	
		?>		
        
        
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso:</td>
          <td><select name="Proceso" required>
          <option value="">Seleccione un Proceso</option>
        <?php
		
		//mostrar el valor del registro de la segunda columna de la tabla 
		
		while ($fila=mysqli_fetch_row($result)){
		echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
			
			}
		?>        
        </select> </td>
        <?php 
         $queryitem2 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result2 = mysqli_query($mysqli,$queryitem2);		
		   	
		?>		
        <tr valign="baseline">
        <td nowrap="nowrap" align="right">Proceso 2:</td>
          <td><select name="Proceso2" >
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila2=mysqli_fetch_row($result2)){
		echo "<option value='".$fila2['0']."'> ".$fila2['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem3 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result3 = mysqli_query($mysqli,$queryitem3);		
		   	
		?>		
        <tr valign="baseline">
        <td nowrap="nowrap" align="right">Proceso 3:</td>
          <td><select name="Proceso3" >
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila3=mysqli_fetch_row($result3)){
		echo "<option value='".$fila3['0']."'> ".$fila3['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem4 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result4 = mysqli_query($mysqli,$queryitem4);		
		   	
		?>		
        <tr valign="baseline">
        <td nowrap="nowrap" align="right">Proceso 4:</td>
          <td><select name="Proceso4" >
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila4=mysqli_fetch_row($result4)){
		echo "<option value='".$fila4['0']."'> ".$fila4['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem1 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result1 = mysqli_query($mysqli,$queryitem1);		
		   	
		?>		
		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso 5:</td>
          <td><select name="Proceso5">
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila1=mysqli_fetch_row($result1)){
		echo "<option value='".$fila1['0']."'> ".$fila1['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem5 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result5 = mysqli_query($mysqli,$queryitem5);		
		   	
		?>		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso 6:</td>
          <td><select name="Proceso6">
        <option value="1">Seleccione un Auditor</option>
        <?php
		while ($fila5=mysqli_fetch_row($result5)){
		echo "<option value='".$fila5['0']."'> ".$fila5['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem6 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result6 = mysqli_query($mysqli,$queryitem6);		
		   	
		?>		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso 7:</td>
          <td><select name="Proceso7">
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila6=mysqli_fetch_row($result6)){
		echo "<option value='".$fila6['0']."'> ".$fila6['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem7 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result7 = mysqli_query($mysqli,$queryitem7);		
		   	
		?>		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso 8:</td>
          <td><select name="Proceso8">
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila7=mysqli_fetch_row($result7)){
		echo "<option value='".$fila7['0']."'> ".$fila7['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem8 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result8 = mysqli_query($mysqli,$queryitem8);		
		   	
		?>		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso 9:</td>
          <td><select name="Proceso9">
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila8=mysqli_fetch_row($result8)){
		echo "<option value='".$fila8['0']."'> ".$fila8['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        <?php 
         $queryitem9 = "SELECT * 
FROM sistema.procesos
WHERE Proceso not like '';";
		$result9 = mysqli_query($mysqli,$queryitem9);		
		   	
		?>		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Proceso 10:</td>
          <td><select name="Proceso10">
        <option value="1">Seleccione un Proceso</option>
        <?php
		while ($fila9=mysqli_fetch_row($result9)){
		echo "<option value='".$fila9['0']."'> ".$fila9['1']."</option>";
			
			}
		?>        
        </select> </td>
        </tr>
        
         		
		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input name="action" type="submit" value="Insertar" /></td>
         <input name="action" type="hidden" value="Insertar" />
        </tr>
      </table>      
    </form>
<?php */?>
		
		

		
	</section>
</body>
</html>