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
	<script src="../js/jquery-2.2.0.min.js" type="text/javascript"></script> 
	<script src="app/editor/nicEdit.js" type="text/javascript"></script> 
	<script> 
	// Formato para los textareas
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas()});
		
	
	
	</script>  
</head>

<body>
	<?php 
		include("includes/menu.php");
		include("includes/menu_left.php");
		
		$id_cat = $_REQUEST['id'];
		$sql= "SELECT * FROM categorias WHERE id_categoria = '$id_cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$cat = $row['categoria'];
		
		$sql= "SELECT COUNT('id_categoria') AS 'categorias' FROM sub_categorias WHERE id_categoria = '$id_cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$num = $row['categorias'];
		
	?>
	
	<main>
		<div class="sub-panel">
				<h1>Categorias > <?php echo $cat ;?><span class="numero"><p> <?php echo $num; ?></p></span> <span class="oculto"> > Añadir Nueva</span></h1>
		</div>
		<div class="box-pag">
			<form action="categorias.php" method="post">
				<?php
				// tamaño de la pagina inicial
					IF (ISSET($_REQUEST['consultar'])){
						$limit = $_REQUEST['paginacion'];
					}
					ELSE{
						$limit=25;
					}
					$inicio = 0;
					IF (ISSET($_REQUEST['pagina'])){
						$inicio = (($_REQUEST['pagina'] -1) * $limit);
					}
					
					$sql= "SELECT categoria FROM categorias";
					$result = mysqli_query($link, $sql);
					$cant = mysqli_num_rows($result);
					$pag = 1;
					
					$maxpag = ceil($cant / $limit);
					
					
				
				?>
				<p>Página 
				<?php
				for($i=0;$i<$maxpag;$i++){
					echo "<a href=\"categorias.php?pagina=$pag\">$pag</a> ";
					$pag++;
				}
				?>/1 (mostrados <?php echo $limit; ?>) | Mostrar 
				<select name="paginacion" > 
					<option value="25"> 25 </option>
					<option value="50"> 50 </option>
					<option value="100"> 100 </option>
				
				</select>  /<?php echo $cant; ?> resultado(s)
				
				<input type="submit" value="Ir" name="consultar"/>
				</p>
			</form>
		</div>
		<div class="listado">
			<table>
				<form action="catalogo.php" method="post">
				<tr>
					<th><p>ID</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
					<th><p>Nombre</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
					<th><p>Descripción</p></th>
					<th><p>Sub-Categorias</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
					<th><p>Acciones</p></th>
				</tr>
				<?php
					$sql = "SELECT * FROM categorias LIMIT $inicio, $limit";
					$result = mysqli_query($link, $sql);
					WHILE($row = mysqli_fetch_array($result)){
						
						$id_cat=$row['id_categoria'];
						$cat=$row['categoria'];
						$deta=$row['descripcion'];
						
						$sql1= "SELECT count(sub_categoria) AS 'num' FROM sub_categorias WHERE id_categoria = '$id_cat'";
						$result1 = mysqli_query($link, $sql1);
						$row1 = mysqli_fetch_array($result1);
						
						$num_subcat = $row1['num'];
						
						echo"
						
						<tr>
							<td>$id_cat</td>
							<td>$cat</td>
							<td>$deta</td>
							<td>$num_subcat</td>
							<td>
								<a href=\"categoriadd.php?id=$id_cat\" ><img src=\"icons/add.png\" alt=\"Agregar\" /></a>
								<a href=\"categoriamod.php?id=$id_cat\" ><img src=\"icons/modificar.png\" alt=\"Modificar\" /></a>
							</td>
						</tr>";
					}
				
				
				?>
				</form>
			</table>
		</div>
	</main>
</body>
</html>