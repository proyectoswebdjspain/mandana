<!DOCTYPE HTML>
<html>
<head>
	<title>Panel Tienda</title>
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
			<a href="categorias.php?newcat">Añadir Categoria</a>
		</section>
		<section>
			<a href="categorias.php?modcat">Modificar Categoria</a>
		</section>
		<section>
			<a href="categorias.php?delcat">Eliminar Categoria</a>
		</section>
		<section>
			<a href="productos.php?newpro">Agregar Productos</a>
		</section>
		<section>
			<a href="productos.php?modpro">Modificar Productos</a>		
		</section>
		<section>
			<a href="productos.php?delpro">Eliminar Productos</a>
		</section>
		
	</main>
</body>
</html>