<?php
	include("../php/clases.php");
	include("../php/conexion.php");
	$id_cat = $_REQUEST['id'];
	
	
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Panel de Administración</title>
	<link rel="shortcut icon" href="icons/panel.ico" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/imagen_view.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<script src="../js/jquery-2.2.0.min.js" type="text/javascript"></script> 
	<script src="app/editor/nicEdit.js" type="text/javascript"></script> 
	<script> 
	// Formato para los textareas
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas()});
		
		
		// Mostrar y ocultar el formulario de añadir producto	
		$(document).ready(function(){
		  $("#eliminar").click(function(){
			$(".eliminar").show();
			$(".modificar").hide();
			$(".visible").hide();
			$(".confirmacion").hide();
			$(".oculto").show();
		  });
		  $("#modificar").click(function(){
			$(".eliminar").hide();
			$(".modificar").show();
			$(".visible").hide();
			$(".oculto").show();
			$(".confirmacion").hide();
		  });
		  $("#ocultar").click(function(){
			$(".eliminar").hide();
			$(".modificar").hide();
			$(".visible").show();
			$(".oculto").hide();
			$(".confirmacion").hide();
		  });
		}) ;
		  
		
	
	
	</script>  
</head>

<body>
	<?php 
		include("includes/menu.php");
		include("includes/menu_left.php");
		
		
		$sql= "SELECT * FROM opciones WHERE id_opcion = '$id_cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$estado = $row['estado'];
		$cat = $row['id_sub_categoria'];
		$nombre = $row['opcion'];
		$descrip = $row['descripcion'];
		
		
		$sql= "SELECT * FROM sub_categorias WHERE id_sub_categoria = '$cat' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$nombresubcategoria = $row['sub_categoria']; 
		$idcategoria = $row['id_categoria']; 
		
		$sql= "SELECT categoria FROM categorias WHERE id_categoria = '$idcategoria' ";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		
		$nombrecategoria = $row['categoria']; 
	?>
	
	<main>
		<div class="sub-panel">
				<h1><a href="categorias.php" >Categorias </a> > <?php echo "<a href=\"categoria.php?id=$idcategoria\">$nombrecategoria " ;?> > <?php echo "<a href=\"opciones.php?id=$cat\">$nombresubcategoria " ;?> > <?php echo "<a href=\"opcion.php?id=$id_cat\">$nombre " ;?> </a>
					<span class="añadir"> > Añadir </span>
					<span class="modificar"> > Modificar </span>
				</h1>
				<span class="visible"><a href="#" id="eliminar"><img src="icons/eliminar.png" alt="Eliminar" title="Eliminar"/><p>Eliminar</p></a></span> 
				<span class="visible"><a href="#" id="modificar"><img src="icons/modificar2.png" alt="modificar" title="Modificar"/><p>Modificar</p></a></span> 
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
			
			
			
			
		</div>
		<div class="modificar">
			<form action="opcion.php?id=<?php echo $id_cat ?>" method="post">
				<h2>Modificar <?php echo $nombre ?></h2>
				<p>Nombre:<input type="text" name="nombre" value="<?php echo $nombre; ?>" size="20"/></p>
				<p>Estado:<select name="estado">
						<?php IF($estado==1){ ?>
							<option value="1" selected>Activo</option>
							<option value="0">Desactivado</option>
						<?php }
						ELSE { ?>
							<option value="1">Activo</option>
							<option value="0" selected>Desactivado</option>
					<?php	} ?>
						
					</select>
				</p>
				<p>Descripción:<input type="text" name="descripcion" value="<?php echo $descrip; ?>" size="70"/></p>
				<input type="submit" name="modificar" />
			</form>
		</div>
		<div class="eliminar">
			<p>¿Desea eliminar <?php echo $nombre; ?> de la base de datos de forma permanente? </p>
		</div>
	</main>
</body>
</html>