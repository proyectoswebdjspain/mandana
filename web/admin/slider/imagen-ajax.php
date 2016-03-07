<?php
	if (isset($_FILES["file"])){
		$file = $_FILES["file"];
		$nombre = $file["name"];
		$tipo = $file["type"];
		$ruta_provisional = $file["tmp_name"];
		$size = $file["size"];
		$dimensiones = getimagesize($ruta_provisional);
		$width = $dimensiones[0];
		$height = $dimensiones[1];
		$carpeta = "img/";
		
		if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png'&& $tipo != 'image/gif'){
			echo "Error, el formato de archivo no es una imagen permitida";
		}
		else if ($size > 1024*1024){
			echo"Error, el tamaño es superior a 1MB";
		}
		else{
			$src = "slider/".$carpeta.$nombre;
			$ruta_destino = $carpeta.$nombre;
			move_uploaded_file($ruta_provisional, $ruta_destino);
			echo "<img src='$src'>";
		}
	}


?>