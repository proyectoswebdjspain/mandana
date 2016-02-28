<?php	
	include("../php/clases.php");
	include("../php/conexion.php");
?>



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
			<h1><a href="galeria.php" >Galeria</a> > <a href="imagenes.php" >Imagenes</a></h1>
			<span class="visible"><a href="subir.php?imagen=añadir" id="añadir"><img src="icons/añadir.png" alt="añadir nuevo" title="añadir nuevo"/><p>Añadir</p></a></span>  
				
		</div>
		
		<div id="portada">
			<?php 
				$sql = "SELECT * FROM imagenes";
				$result = mysqli_query($link, $sql);
				if(mysqli_num_rows($result)==0){
					echo "No Hay Imagenes";
				}
				ELSE{
					
			?>
				<section class="galeria">
					<a href=""><img src="" alt=""/></a>
				</section>
			<?php
				}
			?>
		
		
		
		</div>
		
	</main>
</body>
</html>