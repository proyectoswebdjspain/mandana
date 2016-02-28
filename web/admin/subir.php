<!DOCTYPE HTML>
<html>
<head>
	<title>Panel de Administración</title>
	<link rel="shortcut icon" href="icons/panel.ico" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<style>
		.thumb{
			 height: 200px;
			 border: 1px solid #000;
			 margin: 10px 5px 0 0;
		}
	</style>
</head>

<body>
	<?php 
		include("includes/menu.php");
		include("includes/menu_left.php");
	?>
	
	<main>
		<div class="sub-panel">
			<h1><a href="galeria.php" >Galeria</a> > <a href="imagenes.php" >Imagenes</a> > Añadir</h1>
			<span class="visible"><a href="javascript:history.back(1)" id="volver"><img src="icons/atras.png" alt="Volver" title="Volver"/><p>Volver</p></a></span>  
				
		</div>
		<?php
			IF(ISSET($_REQUEST['imagen'])){
		?>
		<div id="portada">
			<div class="imagen">
				<output id="list" ></output>
			</div>
				<form action="subir.php?subir=imagen" method="POST" enctype="multipart/form-data">
				<p>Selecionar Imagen <input type="file" id="files" name="files[]" />	</p>
				
				
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
				<p>Nombre: <input type="text" value="" name="nombre" /></p>
				<p>Texto Alternativo: <input type="text" value="" name="alt" /></p>
				<p>Titulo: <input type="text" value="" name="titulo" /></p>
				<p><input type="button" value="Subir"/></p>
			</div>

		<?php	
			}
		?>
	</main>
</body>
</html>

