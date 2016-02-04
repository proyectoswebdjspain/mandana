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
		<form action="categoria_modificar.php" method="POST" >
		
		<?php
			IF(isset($_REQUEST['opcion']) && $_REQUEST['opcion'] == 'modificar'){ 
				$id = $_REQUEST['id'];
				
				$sql = "SELECT c.id_categoria, c.categoria, s.sub_categoria, s.id_sub_categoria, o.id_opcion, o.opcion, o.estado FROM categorias c, sub_categorias s, opciones o WHERE c.id_categoria = s.id_categoria and s.id_sub_categoria = o.id_sub_categoria and o.id_opcion = '$id' ";
				$result = mysqli_query($link, $sql);
				$row= mysqli_fetch_array($result);
				$sub = $row['sub_categoria'];
				$cat = $row['categoria'];
				$opcion = $row['opcion'];
				$estado = $row['estado'];
				$id_sub_categoria = $row['id_sub_categoria'];
			?>
			<section class="panel">
			<p>Pertenece a : <select name="subcategoria"> 
				<?php
					echo "<option value=\"$id_sub_categoria\" selected>$sub ($cat)</option>";
					$sql = "SELECT * FROM categorias";
					$result = mysqli_query($link, $sql);
					While($row=mysqli_fetch_array($result)){
						$categoria = $row['categoria'];
						$id_categoria = $row['id_categoria'];
							echo"<option value=\"$categoria\">------------------------$categoria</option>";
							$sql2 = "SELECT * FROM sub_categorias WHERE id_categoria = '$id_categoria'";
							$result2 = mysqli_query($link, $sql2);
							While($row2=mysqli_fetch_array($result2)){
								$subcategoria = $row2['sub_categoria'];
								$id_subcategoria = $row2['id_sub_categoria'];
								
								echo"<option value=\"$id_subcategoria\">$subcategoria ($categoria)</option>";
							}
						
					}
				
				?>
				</select> 
			</p>
			<p> Nuevo nombre para la opción: <input type="text" <?php echo "value=\"$opcion\""; ?> name="nombre" /> </p>
			<p> Estado :<select name="estado">
				<?php 
					IF($estado== 1){ ?>
					<option selected value="1">Visible</option>
					<option value="0">Oculto</option>
						<?php		
					}
					else{	 ?>
						<option value="1">Visible</option>
						<option selected value="0">Oculto</option>
						<?php
					} ?>
				</select>
			</p>
			<input type="hidden" <?php echo"value=\"$id\""; ?> name="id"/>
			<p><input type="submit" value="Aplicar cambios" name="actualizar"/> </p>
			<form>
			</section>
			<?php }
			
			IF(ISSET($_REQUEST['actualizar'])){
				$sub = $_REQUEST['subcategoria'];
				$opcion = $_REQUEST['nombre'];
				$estado = $_REQUEST['estado'];
				$id = $_REQUEST['id'];
				
			//Obtenemos la id de la opcion
				$sql = "SELECT id_opcion FROM opciones WHERE opcion = '$opcion' and id_sub_categoria = '$sub'";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_array($result);
				$idopcion = $row['id_opcion'];
				
			// Realizamos la modificacion de la opcion
				$sql = "UPDATE opciones SET opcion='$opcion', estado='$estado', id_sub_categoria='$sub' WHERE id_opcion = $id";
				$result = mysqli_query($link, $sql);
				
			// Mostramos informacion del proceso	
				if($result == true){
					echo "<p>Actualización... OK</p>";
				}
				else{
					echo "<p>Actualización... Fallida</p>";
				}
				
			}
		
				
			?>
			
		<table>
			<tr>
				<th>Categoria</th>
				<th>Sub-Categoria</th>
				<th>Opción</th>
				<th>Estado</th>
				<th>Herramientas</th>
			</tr>
			<?php 
				$sql = "SELECT c.id_categoria, c.categoria, s.sub_categoria,o.id_opcion, o.opcion, o.estado FROM categorias c, sub_categorias s, opciones o WHERE c.id_categoria = s.id_categoria and s.id_sub_categoria = o.id_sub_categoria ORDER BY c.id_categoria";
				$result = mysqli_query($link, $sql);
				While($row=mysqli_fetch_array($result)){
					$categoria=$row['categoria'];
					$idcat=$row['id_categoria'];
					$sub_categoria=$row['sub_categoria'];
					$opcione=$row['opcion'];
					$estado=$row['estado'];
					$idopcion=$row['id_opcion'];
					echo" 
					<tr>
						<td ";
						
						if($idcat== 1){ 
							echo "class=\"color1\"";
						} 
						if($idcat== 2){ 
							echo "class=\"color2\"";
						} 
						if($idcat== 3){ 
							echo "class=\"color3\"";
						} 
						if($idcat== 4){ 
							echo "class=\"color4\"";
							
						} if($idcat== 5){ 
							echo "class=\"color5\"";
						} 
						if($idcat== 6){ 
							echo "class=\"color6\"";
						} 
						if($idcat== 7){ 
							echo "class=\"color7\"";
						} 
						if($idcat== 8){ 
							echo "class=\"color8\"";
						} 
						
						
						echo" >$categoria</td>
						<td>$sub_categoria</td>
						<td>$opcione</td>
						<td>";
						if($estado==1){
							echo"<img src=\"\" alt=\"visible\"/>";
						}
						else {
							echo"<img src=\"\" alt=\"oculto\"/>";
						}
						
						
						echo"
						</td>
						<td>	<a href=\"categoria_modificar.php?opcion=modificar&id=$idopcion\" ><img src='img/icons/modificar.png' alt=\"modificar\"></a>
								<a href=\"#\" ><img src='img/icons/papelera.png' alt=\"eliminar\"></a>	</td>
					</tr>
					";
				}
			?>
		</table>
		
		<?php  
		
		include("includes/cerrar_conexion.php");
		
		?>
		
		</form>
		
	</main>
	</main>
</body>
</html>