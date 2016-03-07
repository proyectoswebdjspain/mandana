<!DOCTYPE HTML>
<html>
<head>
	<title>Panel de Administración</title>
	<link rel="shortcut icon" href="icons/panel.ico" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php 
		include("includes/menu.php");
		include("includes/menu_left.php");
	?>
	
	<main>
		<div class="sub-panel">
			<h1><a href="galeria.php" >Galeria</a></h1>
		</div>
		<div id="portada">
			<a href="imagenes.php"><img src="icons/imagenes.png" alt="Imagenes"/></a>
			<a href="videos.php"><img src="icons/video.png" alt="Videos"/></a>
			<a href="documentos.php"><img src="icons/documentos.png" alt="Documentos"/></a>
		</div>
	</main>
</body>
</html>