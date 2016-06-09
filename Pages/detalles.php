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
		<h1>Detalles</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
		</a>
	</header>
	<section>
		
	<?php
	  
		include '../conexion.php';
		$re=mysqli_query($mysqli,"select * from productos where Cod_Producto =".$_GET['id'])or die(mysql_error());
		while ($f=mysqli_fetch_array($re)) {
		?>


			<div class="producto">
			<center>
				<img src="../productos/<?php echo $f['Imagen'];?>"><br>
				<span><?php echo $f['Nombre'];?></span><br>
                Descripcion del producto:<span><?php echo $f['Descripcion'];?></span><br>
                Precio: $<span><?php echo $f['Precio'];?></span><br>
                
				<a href="../carritodecompras.php?id=<?php echo $f['Cod_producto']; ?>">Añadir al Carrito</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>