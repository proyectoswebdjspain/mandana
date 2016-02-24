<?php
	include("../php/clases.php");
	include("../php/conexion.php");
	$id_cat = $_REQUEST['id'];
	IF(isset($_REQUEST['modificar'])){
		$descrip = $_REQUEST['descripcion'];
		$nombre = $_REQUEST['nombre'];
		$visibilidad = $_REQUEST['estado'];
		$sql="UPDATE sub_categorias SET descripcion = '$descrip', sub_categoria = '$nombre', visibilidad = '$visibilidad' WHERE id_sub_categoria = '$id_cat' ";
		if(mysqli_query($link, $sql)){
			$mensaje="Descripción modificada con extio <img src=\"icons/check.png\" alt=\"check\"/>";
		}
		ELSE{
			$mensaje="Error al modificar la descripcion";
		}
		
	}
	IF(isset($_REQUEST['añadir'])){
		$descrip = $_REQUEST['descripcion'];
		$nombre = $_REQUEST['nombre'];
		$estado = $_REQUEST['estado'];
		$sql = "SELECT * FROM opciones WHERE opcion = '$nombre' AND id_sub_categoria = '$id_cat'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_num_rows($result);
		if($row != 0){
			$mensaje="Ya existe una Opción con ese nombre para esta Subcategoria <img src=\"icons/cancelar.png\" alt=\"error\" width=\"30\"/>";
		}
		else{
			$sql="INSERT INTO `mandana`.`opciones` (`id_opcion`, `id_sub_categoria`, `opcion`, `descripcion`, `estado`) VALUES ('', '$id_cat', '$nombre', '$descrip', '$estado')";
			if(mysqli_query($link, $sql)){
				$mensaje="Opción añadida con extio <img src=\"icons/check.png\" alt=\"check\"/>";
			}
			ELSE{
				$mensaje="Error al añadir Opción <img src=\"icons/cancelar.png\" alt=\"error\"/>";
			}
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
	<link href="css/imagen_view.css" rel="stylesheet" type="text/css" media="all" />
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
			$(".confirmacion").hide();
			$(".oculto").show();
		  });
		  $("#modificar").click(function(){
			$(".añadir").hide();
			$(".modificar").show();
			$(".visible").hide();
			$(".oculto").show();
			$(".confirmacion").hide();
		  });
		  $("#ocultar").click(function(){
			$(".añadir").hide();
			$(".modificar").hide();
			$(".visible").show();
			$(".oculto").hide();
			$(".confirmacion").hide();
		  }); 
		  $("#versi").click(function(){
			$(".ver").show();
		  });
		  $("#verno").click(function(){
			$(".ver").hide();
			
		  });
		}) ;
		  
		
	
	
	</script>  
</head>

<body>
	<?php 
		include("includes/menu.php");
		include("includes/menu_left.php");
		
		
		$sql= "SELECT * FROM sub_categorias WHERE id_sub_categoria = '$id_cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$estadocat = $row['visibilidad'];
		$cat = $row['id_categoria'];
		$nomcat = $row['sub_categoria'];
		$detacat = $row['descripcion'];
		$sql= "SELECT COUNT('id_sub_categoria') AS 'categorias' FROM opciones WHERE id_sub_categoria = '$id_cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$num = $row['categorias'];
		
		$sql2= "SELECT categoria FROM categorias WHERE id_categoria = '$cat' ";
		$result2 = mysqli_query($link, $sql2);
		$row2 = mysqli_fetch_array($result2);
		
		$nombrecategoria = $row2['categoria']; 
		
	?>
	
	<main>
		<div class="sub-panel">
				<h1><a href="categorias.php" >Categorias </a> > <?php echo "<a href=\"categoria.php?id=$cat\">$nombrecategoria " ;?> > <?php echo "<a href=\"opciones.php?id=$id_cat\">$nomcat " ;?><span class="numero"><p> <?php echo $num; ?></p></span> </a>
					<span class="añadir"> > Añadir </span>
					<span class="modificar"> > Modificar </span>
				</h1>
				<span class="visible"><a href="#" id="añadir"><img src="icons/añadir.png" alt="añadir nuevo" title="añadir nuevo"/><p>Añadir</p></a></span> 
				<span class="visible"><a href="#" id="modificar"><img src="icons/modificar2.png" alt="modificar" title="modificar"/><p>Modificar</p></a></span> 
				<span class="oculto"> <a href="#" id="ocultar"><img src="icons/cancelar.png" alt="Cancelar" title="Cancelar"/><p>Cancelar</p> <br/></a></span>
		</div>
		<?php
		IF (isset($mensaje)){
		?>	
			<div class="confirmacion">
				<p><?php echo $mensaje ?></p>
			</div>
		<?php	
		}
		?>
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
					
					$sql= "SELECT * FROM opciones WHERE id_sub_categoria = '$id_cat' ";
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

			$sql = "SELECT * FROM opciones WHERE id_sub_categoria = '$id_cat' LIMIT $inicio, $limit ";
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
					<div class="subcat"><p>Estado</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></div>
				</div>
				
				
				
			<?php	 
					
						WHILE($row = mysqli_fetch_array($result)){
							
							$id_sub_cat=$row['id_opcion'];
							$cat=$row['opcion'];
							$deta=$row['descripcion'];
							$estadoinicial = $row['estado'];
							IF ($deta == ""){
								$deta = "No hay descripción disponible";
							}
							
							if($estadoinicial==1){
								$estado = "<p style=\"color:green;\">Activo</p>";
							}
							else{
								$estado = "<p style=\"color:red;\">Desactivado</p>";
							}
							
							echo"
							
								<div class=\"fila\">
									<a href=\"opcion.php?id=$id_sub_cat\">
										<div class=\"id\"><p>$id_sub_cat</p></div>
										<div class=\"nombre\"><p>$cat</p></div>
										<div class=\"descrip\"><p>$deta</p></div>
										<div class=\"subcat\">$estado</div>
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
			<div class="imagen">
				<output id="list" ></output>
				
			</div>
			<form action="opciones.php?id=<?php echo $id_cat ?>" method="post">
				<h2>Modificar la Subcategoria > <?php echo $nomcat ?></h2>
				<p>Nombre:<input type="text" name="nombre" value="<?php echo $nomcat; ?>" size="20"/></p>
				<p>Estado:<select name="estado">
						<?php IF($estadocat==1){ ?>
							<option value="1" selected>Visible</option>
							<option value="0">Oculto</option>
						<?php }
						ELSE { ?>
							<option value="1">Visible</option>
							<option value="0" selected>Oculto</option>
					<?php	} ?>
						
					</select>
				</p>
				<p>Descripción:<input type="text" name="descripcion" value="<?php echo $detacat; ?>" size="70"/></p>
				<p>Mostrar imagen <input type="radio" name="ver" value="no" checked id="verno"/>NO<input type="radio" name="ver" value="si" id="versi"/>SI</p>
				<div class="ver">
					<p>Selecionar Imagen <input type="file" id="files" name="files[]" multiple />	</p>
					
					
					 <script>
							  function archivo(evt) {
								  var files = evt.target.files; // FileList object
							 
								  // Obtenemos la imagen del campo "file".
								  for (var i = 0, f; f = files[i]; i++) {
									//Solo admitimos imágenes.
									if (!f.type.match('image.*')) {
										continue;
									}
							 
									var reader = new FileReader();
							 
									reader.onload = (function(theFile) {
										return function(e) {
										  // Insertamos la imagen
										 document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
										};
									})(f);
							 
									reader.readAsDataURL(f);
								  }
							  }
							 
							  document.getElementById('files').addEventListener('change', archivo, false);
					  </script>
					
					
					
					<p>Posicion de la imagen :
						<select name="posicion_img">
							<option value="abajo" selected>Abajo</option>
							<option value="derecha">Derecha</option>
							<option value="izquierda">Izquierda</option>
						</select>
					</p>
				</div>
				<input type="submit" name="modificar" />
			</form>
		</div>
		<div class="añadir">
			<form action="opciones.php?id=<?php echo $id_cat ?>" method="post">
				<h2>Añadir Opción a <?php echo $nomcat ?></h2>
				<p>Nombre:<input type="text" value="" name="nombre" /></p>
				<p>Estado:<select name="estado">
						<option value="1">Activo</option>
						<option value="0" selected>Desactivado</option>
					</select>
				</p>
				<p>Descripción:<input type="text" value="" name="descripcion" size="70"/></p>
				<p><input type="submit" value="Añadir" name="añadir" /></p>
			</form>	
		</div>
	</main>
</body>
</html>