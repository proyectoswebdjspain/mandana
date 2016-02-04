<!DOCTYPE HTML>
<html>
<head>
	<title>Panel Modificar Categoria</title>
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
		<main>
		<form action="" method="POST" >
	
	<!-- Confirmar el cambio de nombre de la categoria -->
		<?php IF(ISSET($_REQUEST['modificar'])){ 
			$categoria = $_REQUEST['tabla'];
			$nombre = $_REQUEST['categoria'];
			
			$sql = "UPDATE $categoria SET  WHERE ";
			$result = mysqli_query($link, $sql);
			if($result == true){
				echo "<p>Modificación Exitosa</p>";
			}
			else{
				echo "<p>Modificación Fallida</p>";
			}
		
		?>
		
		<p><input type="submit" value="Modificar" name="modificar"/> </p>
	<!-- Buscar todas las opciones de esa categoria del menu y mostrar un desplegable con ellas 
	y otro con todas las categorias nuevamente por si se interesa cambiar tambien la categoria (Mover) -->	
		<?php }
			ELSEIF(ISSET($_REQUEST['buscar'])){ 
		?>
		
		<p> Nuevo nombre para la opción: <input type="text" value="" name="categoria" /> </p>
		
		<select name="tabla">
			<?php
				$categoria = $_REQUEST['tabla'];
				$sql = "SELECT * FROM categorias";
				$result = mysqli_query($link, $sql);
				echo "<option value=\"$categoria\" selected>$categoria</option>";
				While($row=mysqli_fetch_array($result)){
					$categoria = $row['nombre_cat'];
					echo"<option value=\"$categoria\">$categoria</option>";
				}
			
			?>
		</select>
		<p><input type="submit" value="Modificar" name="modificar"/> </p>
		<?php 
			}
			else {  
		?>
	<!-- Elegir categoria del menu desde el cual se desea cambiar -->	
		<p>Categoria de Menú del que se desea modificar:	
			<select name="tabla">
				<?php
					
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['nombre_cat'];
						echo"<option value=\"$categoria\">$categoria</option>";
					}
				
				?>
			</select>
		</p>
		<p><input type="submit" value="Buscar" name="buscar"/> </p>
		
		<?php } 
		
		include("includes/cerrar_conexion.php");
		
		?>
		
		</form>
		
	</main>
	</main>
</body>
</html>