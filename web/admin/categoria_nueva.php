<!DOCTYPE HTML>
<html>
<head>
	<title>Panel Nueva Categoria</title>
	<link rel="shortcut icon" href="images/favicon.ico" >
	<link rel="icon" type="image/gif" href="images/animated_favicon1.gif" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/administracion.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php
		$categoria = 1;
		include("includes/header.php");
		include("includes/conexion.php");
	?>
	<main>
		<?php
			IF(ISSET($_REQUEST['añadir1'])){
				$categoria = $_REQUEST['tabla'];
				$subcategoria = $_REQUEST['tipo'];
					
			}
			IF(ISSET($_REQUEST['añadir2'])){
				$categoria = $_REQUEST['tabla'];
				$subcategoria = $_REQUEST['tipo'];
				$opcion = $_REQUEST['categoria'];
			}
			
		
		
	
		?>
		<section class="panel">
		
			<form action="" method="POST" >
			
			<h1>Añadir una subcategoria</h1>
			
			<p>Categoria de Menú:	<select name="tabla">
				<?php
					
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['nombre_cat'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				include("includes/cerrar_conexion.php");
				?>
								</select>
			</p>
			<p>Nueva Sub-Categoria: <input type="text" value="" name="dub-categoria" /> </p>
			<p><input type="submit" value="Añadir" name="añadir1" /> </p>
			</form>
		</section>
		<section class="panel">
			<form action="" method="POST" >
			<p>Categoria de Menú:	<select name="tabla">
				<?php
					
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['nombre_cat'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				include("includes/cerrar_conexion.php");
				?>
								</select>
			</p>
			<p>Sub-Categoria:	<select name="tipo">
				<?php
					
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['nombre_cat'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				include("includes/cerrar_conexion.php");
				?>
								</select>
			</p>
			<p>Nombre para la nueva opción: <input type="text" value="" name="categoria" /> </p>
			<p><input type="submit" value="Añadir" name="añadir2"/> </p>
			</form>
		</section>
	</main>
</body>
</html>