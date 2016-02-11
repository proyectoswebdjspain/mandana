<!DOCTYPE HTML>
<html>
<head>
	<title>Panel Menus</title>
	<link rel="shortcut icon" href="images/favicon.ico" >
	<link rel="icon" type="image/gif" href="images/animated_favicon1.gif" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/administracion.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php
		$categoria = 1;
		include("includes/header.php");
	?>
	<main>
		<section>
			<a href="categoria_nueva.php">Añadir Opción de Menú</a>
		</section>
		<section>
			<a href="categoria_modificar.php">Modificar Opción de Menú</a>
		</section>
		<section>
			<a href="categoria_eliminar.php">Eliminar Opción de Menú</a>
		</section>
		<section>
			<a href="producto_nuevo.php">Agregar Productos</a>
		</section>
		<section>
			<a href="producto_modificar.php">Modificar Productos</a>		
		</section>
		<section>
			<a href="producto_eliminar.php">Eliminar Productos</a>
		</section>
		
	</main>
</body>
</html>