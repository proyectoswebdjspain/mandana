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
		
		
		// Mostrar y ocultar el formulario de añadir producto	
		$(document).ready(function(){
		  $("#añadir").click(function(){
			$(".añadir").show();
			$(".modificar").hide();
			$(".visible").hide();
		  });
		  $("#modificar").click(function(){
			$(".añadir").hide();
			$(".modificar").show();
			$(".visible").hide();
		  });
		}) ;
		  
		
	
	
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
		
		$nomcat = $row['categoria'];
		$detacat = $row['descripcion'];
		$sql= "SELECT COUNT('id_categoria') AS 'categorias' FROM sub_categorias WHERE id_categoria = '$id_cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$num = $row['categorias'];
		
	?>
	
	<main>
		<div class="sub-panel">
				<h1>Categorias > <?php echo $nomcat ;?><span class="numero"><p> <?php echo $num; ?></p></span> 
					<span class="añadir"> > Añadir </span>
					<span class="modificar"> > Modificar </span>
				</h1>
				<span class="visible"><a href="#" id="añadir"><img src="icons/añadir.png" alt="añadir nuevo" title="añadir nuevo"/><p>Añadir</p></a></span> 
				<span class="visible"><a href="#" id="modificar"><img src="icons/modificar2.png" alt="modificar" title="modificar"/><p>Modificar</p></a></span> 
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
					
					$sql= "SELECT * FROM sub_categorias";
					$result = mysqli_query($link, $sql);
					$cant = mysqli_num_rows($result);
					$pag = 1;
					
					$maxpag = ceil($cant / $limit);
		IF($maxpag > 1){
		?>
			<div class="box-pag">
				<form action="catalogo.php" method="post">
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
		<?php }	

			$sql = "SELECT * FROM sub_categorias WHERE id_categoria = '$id_cat' LIMIT $inicio, $limit ";
			$result = mysqli_query($link, $sql);
			
			IF($row = mysqli_num_rows($result)==0){
				echo"
				
					<div class=\"fila\">
						<p>No existen categorias para $nomcat</p>
					</div>
				
				";
			}
		
			
			
	// LISTADO DE CATEGORIAS DISPONIBLES		
				
			ELSE{
		?>
			
			
			
			
			
			
			<div class="listado">
				<div class="fila1">
					<div class="id"><p>ID</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
					<div class="nombre"><p>Nombre</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
					<div class="descrip"><p>Descripción</p></div>
					<div class="subcat"><p>Listas</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
				</div>
				
				
				
			<?php	 
					
						WHILE($row = mysqli_fetch_array($result)){
							
							$id_sub_cat=$row['id_sub_categoria'];
							$cat=$row['sub_categoria'];
							$deta=$row['descripcion'];
							
							IF ($deta == ""){
								$deta = "No hay descripción disponible";
							}
							
							
							$sql1= "SELECT count(id_sub_categoria) AS 'num' FROM opciones WHERE id_sub_categoria = '$id_sub_cat'";
							$result1 = mysqli_query($link, $sql1);
							$row1 = mysqli_fetch_array($result1);
							
							$num_subcat = $row1['num'];
							
							echo"
							
								<div class=\"fila\">
									<a href=\"opcion.php?id=$id_sub_cat\">
										<div class=\"id\"><p>$id_sub_cat</p></div>
										<div class=\"nombre\"><p>$cat</p></div>
										<div class=\"descrip\"><p>$deta</p></div>
										<div class=\"subcat\"><p>$num_subcat</p></div>
									</a>
								</div>
							
							";
						}
				?>	
			</div>
				<?php		
				}
				
				?>
			
		</div>
		<div class="modificar">
			<form action="categoria.php?id=$id_cat" method="post">
				<h2>Cambiar la descricion de la Categoria > <?php echo $nomcat ?></h2>
				<p>Descripción:<input type="text" name="descripcion" value="<?php echo $detacat; ?>" size="70"/></p>
				<input type="submit" name="modificar" />
			</form>
		</div>
		<div class="añadir">
		
		</div>
	</main>
</body>
</html>