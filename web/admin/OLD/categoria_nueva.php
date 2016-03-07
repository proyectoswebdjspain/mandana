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
				$categoria = $_REQUEST['categoria'];
				
			// Obtener id de categoria
				$sql = "SELECT id_categoria FROM categorias WHERE categoria = '$categoria'";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_array($result);
				
				$categoria = $row['id_categoria'];
				
			// Añadimos la subcategoria	
				$subcategoria = $_REQUEST['sub_categoria'];
				$sql = "INSERT INTO `mandana`.`sub_categorias` (`id_sub_categoria`, `id_categoria`, `sub_categoria`) VALUES ('', '$categoria', '$subcategoria');";	
				$result = mysqli_query($link, $sql);
				
				if($result == true){
					echo "Se ha agregado correctamente la sub categoria $subcategoria";
				}
				else{
					echo "Error al añadir la sub categoria $subcategoria";
				}
			
			}
			IF(ISSET($_REQUEST['añadir2'])){
				$categoria = $_REQUEST['categoria'];
				$subcategoria = $_REQUEST['subcategoria'];
				$opcion = $_REQUEST['opcion'];
				$estado = $_REQUEST['estado'];
				
			// Obtener id de categoria
				$sql = "SELECT id_categoria FROM categorias WHERE categoria = '$categoria'";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_array($result);
				
				$idcategoria = $row['id_categoria'];
			
			// Obtener id de la subcategoria		
				$sql ="SELECT id_sub_categoria FROM sub_categorias WHERE id_categoria = '$idcategoria' AND sub_categoria = '$subcategoria'";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_array($result);
				
				$idsubcategoria = $row['id_sub_categoria'];
			
			// Añadimos la opcion a la base de datos
				
				$sql = "INSERT INTO `mandana`.`opciones` (`id_opcion`, `id_sub_categoria`, `opcion`, `estado`) VALUES ('', '$idsubcategoria', '$opcion', '$estado');";	
				$result = mysqli_query($link, $sql);
				
				if($result == true){
					echo "Se ha agregado correctamente la opcion $opcion a la sub-categoria $subcategoria";
				}
				else{
					echo "Error al añadir la la opcion $opcion a la sub-categoria $subcategoria";
				}
			}
			
		?>
		<section class="panel">
		
			<form action="" method="POST" >
			
			<h1>Añadir una subcategoria</h1>
			
			<p>Categoria de Menú:	<select name="categoria">
				<?php
					
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						echo "1";
						$categoria = $row['categoria'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				include("includes/cerrar_conexion.php");
				?>
								</select>
			</p>
			<p>Nueva Sub-Categoria: <input type="text" value="" name="sub_categoria" /> </p>
			<p>Imagen que acompañe la subcategoria: <input type="file" name="imgsubcategoria" /></p>
			<p><input type="submit" value="Añadir" name="añadir1" /> </p>
			</form>
		</section>
		<section class="panel">
			<form action="" method="POST" >
			
			<h1>Añadir una opcion a una subcategoria</h1>
			
			<p>Categoria de Menú:	<select name="categoria">
				<?php
					
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['categoria'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				include("includes/cerrar_conexion.php");
				?>
								</select>
			</p>
			<p>Sub-Categoria:	<select name="subcategoria">
				<?php
					
					$sql = "SELECT * FROM sub_categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['sub_categoria'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				include("includes/cerrar_conexion.php");
				?>
								</select>
			</p>
			<p>Nombre para la nueva opción de la sub-categoria: <input type="text" value="" name="opcion" /> </p>
			<p>Estado: <select name="estado">
				<option value="1" >Visible</option>
				<option value="0" selected>Oculto</option>
			</select></p>
			<p><input type="submit" value="Añadir" name="añadir2"/> </p>
			</form>
		</section>
	</main>
	<?php  
		
		include("includes/cerrar_conexion.php");
		
		?>
</body>
</html>