<!DOCTYPE HTML>
<html>
<head>
	<title>Panel de Administración</title>
	<link rel="shortcut icon" href="icons/panel.ico" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="slider/dist/css/unslider.css" rel="stylesheet" type="text/css" media="all" />
	<link href="slider/dist/css/unslider-dots.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery-2.2.1.js"></script>
	<script src="slider/src/js/unslider.js"></script>
	<script>
	// Mostrar / Ocultar divs
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
		
	// subir imagenes via AJAX
		$(function(){
			$("input[name='file']").on("change", function(){
				var formData = new FormData($("#formulario") [0])
				var ruta = "slider/imagen-ajax.php";
				$.ajax({
					url: ruta,
					type: "post",
					data: formData,
					contentType: false,
					processData: false,
					success: function(datos){
						$("#respuesta").html(datos);
					}
				})
			});
		});
		
		
		jQuery(document).ready(function($) {
			$('.my-slider').unslider();
		});
	</script>
</head>

<body>
	<?php 
		include("includes/menu.php");
		include("includes/menu_left.php");
	?>
	
	<main>
		<div class="sub-panel">
				<h1><a href="slider.php" >Slider </a> 
					<span class="añadir"> > Añadir </span>
					<span class="modificar"> > Modificar </span>
				</h1>
				<span class="visible"><a href="#" id="añadir"><img src="icons/añadir.png" alt="añadir nuevo" title="añadir nuevo"/><p>Añadir</p></a></span> 
				<span class="visible"><a href="#" id="modificar"><img src="icons/modificar2.png" alt="modificar" title="modificar"/><p>Modificar</p></a></span> 
				<span class="oculto"> <a href="#" id="ocultar"><img src="icons/cancelar.png" alt="Cancelar" title="Cancelar"/><p>Cancelar</p> <br/></a></span>
		</div>
		<div class="visible">
			<div class="my-slider">
				<ul>
					<li>My slide</li>
					<li>Another slide</li>
					<li>My last slide</li>
				</ul>
			</div>
		
		</div>
		
		
		
		
		<form method="post" id="formulario" enctype="multipart/form-data">
			Subir imagen: <input type="file" name="file">
		
		</form>
		<div id="respuesta"></div>
	</main>
</body>
</html>