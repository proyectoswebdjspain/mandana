<!DOCTYPE HTML>
<html>
<head>
	<title>Panel Portada</title>
	<link rel="shortcut icon" href="images/favicon.ico" >
	<link rel="icon" type="image/gif" href="images/animated_favicon1.gif" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/administracion.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php
		$categoria = 3;
		include("admin/header.php");
	?>
	<main>
		<section>
			<a href="tienda.php?newcat">Añadir Categoria</a>
		</section>
		<section>
			<a href="tienda.php?modcat">Modificar Categoria</a>
		</section>
		<section>
			<a href="tienda.php?delcat">Eliminar Categoria</a>
		</section>
		<section>
			<a href="tienda.php?newpro">Agregar Productos</a>
		</section>
		<section>
			<a href="tienda.php?modpro">Modificar Productos</a>		
		</section>
		<section>
			<a href="tienda.php?delpro">Eliminar Productos</a>
		</section>
		
	</main>
</body>
</html>