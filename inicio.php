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
		<h1>Carrito De Compras</h1>
		<a href="carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
    <script>
function cerrar()
{
	if(confirm('Desea Cerrar Sesion?'))
		return true;
	else
		return false;
}
</script>
    <div align="right"> <h3><a href="log_out.php" onclick="return cerrar()" >Cerrar Sesi&oacute;n </a></h3></div>
	<section>
		
	<?php
		include 'conexion.php';
		$re=mysqli_query($mysqli,"select * from productos")or die(mysql_error());
		while ($f=mysqli_fetch_array($re)) {
		?>


			<div class="producto">
			<center>
				<img src="./productos/<?php echo $f['Imagen'];?>"><br>
				<span><?php echo $f['Nombre'];?></span><br>
                <span>Precio: $<?php echo $f['Precio'];?></span><br>
				<a href="Pages/detalles.php?id=<?php echo $f['Cod_producto']; ?>">ver</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>