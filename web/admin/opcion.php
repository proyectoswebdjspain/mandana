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
				<h1><a href="categorias.php" >Categorias </a> > <?php echo "<a href=\"categoria.php?id=$cat\">$nombrecategoria " ;?> > <?php echo "<a href=\"opciones.php?id=$id_cat\">$nombresubcategoria " ;?> > <?php echo "<a href=\"opcion.php?id=$id_cat\">$nombre " ;?> </a>
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
			
			
			
			
		</div>
		
	</main>
</body>
</html>