<?php
	include("../php/clases.php");
	include("../php/conexion.php");
	
	IF(ISSET($_REQUEST['guardar'])){
		$productos = $_REQUEST['producto'];
		// Conectando al servidor y a la base de datos
		$conectadb = new mysql("localhost","root","","mandana");
		
		echo $_REQUEST['producto'];
		
		
		
		$i=0;
		foreach($productos as $producto){
			echo $producto.$i."<br>";
			$i++;
		}
		
	}
	
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
	?>
	
	<main>
		<div class="sub-panel">
				<h1>Categorias <span class="oculto"> > Añadir Nueva</span></h1>
		</div>
		<div class="visible">
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
					IF ($maxpag>1){	
						
					
					?>
			<div class="box-pag">
				<form action="categorias.php" method="post">
					
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
					<?php } ?>
			<div class="listado">
					<div class="fila1">
						<div class="id"><p>ID</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
						<div class="nombre"><p>Nombre</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
						<div class="descrip"><p>Descripción</p></div>
						<div class="subcat"><p>Categorias</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
					</div>
					
					
					
					
					<?php
					
			// LISTADO DE CATEGORIAS DISPONIBLES		
						$sql = "SELECT * FROM categorias LIMIT $inicio, $limit";
						$result = mysqli_query($link, $sql);
						WHILE($row = mysqli_fetch_array($result)){
							
							$id_cat=$row['id_categoria'];
							$cat=$row['categoria'];
							$deta=$row['descripcion'];
							
							IF ($deta == ""){
								$deta = "No hay descripción disponible";
							}
							
							
							$sql1= "SELECT count(sub_categoria) AS 'num' FROM sub_categorias WHERE id_categoria = '$id_cat'";
							$result1 = mysqli_query($link, $sql1);
							$row1 = mysqli_fetch_array($result1);
							
							$num_subcat = $row1['num'];
							
							echo"
							
								<div class=\"fila\">
									<a href=\"categoria.php?id=$id_cat\">
										<div class=\"id\"><p>$id_cat</p></div>
										<div class=\"nombre\"><p>$cat</p></div>
										<div class=\"descrip\"><p>$deta</p></div>
										<div class=\"subcat\"><p>$num_subcat</p></div>
									</a>
								</div>
							
							";
						}
					
					
					?>
			</div>
		</div>
	</main>
</body>
</html>