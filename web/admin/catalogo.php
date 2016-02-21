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
		
	
	
	// Mostrar y ocultar el formulario de añadir producto	
		$(document).ready(function(){
		  $("#ocultar").click(function(){
			$(".oculto").hide();
			$(".visible").show();
		  });
		  $("#mostrar").click(function(){
			$(".visible").hide();
			$(".oculto").show();
			$("#precio").hide();
			$("#asociados").hide();
			$("#cantidad").hide();
			$("#imagenes").hide();
			$("#proveedores").hide();
		  });
		  
		// muestra y oculta los diferentes campos de catalogo  
		  $("#boton1").click(function(){
			$("#informacion").show();
			$("#precio").hide();
			$("#asociados").hide();
			$("#cantidad").hide();
			$("#imagenes").hide();
			$("#proveedores").hide();
		  });
		  $("#boton2").click(function(){
			$("#informacion").hide();
			$("#precio").show();
			$("#asociados").hide();
			$("#cantidad").hide();
			$("#imagenes").hide();
			$("#proveedores").hide();
		  });
		  $("#boton3").click(function(){
			$("#informacion").hide();
			$("#precio").hide();
			$("#asociados").show();
			$("#cantidad").hide();
			$("#imagenes").hide();
			$("#proveedores").hide();
		  });
		  $("#boton4").click(function(){
			$("#informacion").hide();
			$("#precio").hide();
			$("#asociados").hide();
			$("#cantidad").show();
			$("#imagenes").hide();
			$("#proveedores").hide();
		  });
		  $("#boton5").click(function(){
			$("#informacion").hide();
			$("#precio").hide();
			$("#asociados").hide();
			$("#cantidad").hide();
			$("#imagenes").show();
			$("#proveedores").hide();
		  });
		  $("#boton6").click(function(){
			$("#informacion").hide();
			$("#precio").hide();
			$("#asociados").hide();
			$("#cantidad").hide();
			$("#imagenes").hide();
			$("#proveedores").show();
		  });
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
				<h1>Catalogo > Productos <span class="oculto"> > Añadir Nuevo</span></h1>
				<span class="visible"><a href="#" id="mostrar"><img src="icons/añadir.png" alt="añadir nuevo" title="añadir nuevo"/><p>Añadir</br>nuevo</p></a></span> 
				<span class="oculto"> <a href="#" id="ocultar"><img src="icons/cancelar.png" alt="Cancelar" title="Cancelar"/><p>Cancelar</p> <br/></a></span>
		</div>	
		<div class="visible">
			<div class="box-pag">
				<form action="catalogo.php" method="post">
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
					
					$sql= "SELECT id_producto FROM productos";
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
						<th><p>--</p><br/></th>
						<th><p>ID</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Foto</p><br/></th>
						<th><p>Nombre</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Referencia</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Categoria</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Precio base</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Precio final</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Cantidad</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Mostrado</p><a href="" ><img src="icons/ordenabajo.png" alt="" /></a> <a href="" ><img src="icons/ordenarriba.png" alt="" /></a></th>
						<th><p>Acciones</p></th>
					</tr>
					<tr class="agregar">
						<td>--</td>
						<td><input type="text" name="id" size="2"/></td>
						<td>--</td>
						<td><input type="text" name="nombre" size="15" /></td>
						<td><input type="text" name="referencia" size="5" /></td>
						<td><input type="text" name="categoria" size="7" /></td>
						<td><input type="text" name="preciobase" size="8" /></td>
						<td><input type="text" name="preciofinal" size="8" /></td>
						<td><input type="text" name="cantidad" size="8" /></td>
						<td><select >
							<option selected value="">--</option>
							<option  value="1">SI</option>
							<option  value="0">NO</option>
						</select></td>
						<td><input type="submit" name="filtrar" value="Buscar" /></td>
					</tr>
					<?php
						
					
					
					?>
					</form>
				</table>
			</div>
		</div>
	<!-- Opciones para añadir un producto nuevo -->	
		<div class="oculto">
			<div class="sub_menu">
				<ul>
					<li><a href="#" id="boton1">Información</a></li>
					<li><a href="#" id="boton2">Precio</a></li>
					<li><a href="#" id="boton3">Asociaciones</a></li>
					<li><a href="#" id="boton4">Cantidades</a></li>
					<li><a href="#" id="boton5">Imagenes</a></li>
					<li><a href="#" id="boton6">Proveedores</a></li>
				</ul>
			</div>
			<div id="informacion">
				<div class="fondo">
					<div id="opcion">
						<img src="" alt="informacion" /><h2>Informacion</h2>
					</div>
					<form action="catalogo.php" method="POST">
						<div class="campo">
							<p>Nombre:<input type="text" name="nombre" value=""/> </p>
						</div>	
						<div class="campo">
							<p>Codigo de Referencia:<input type="text" name="referencia" size="8" value=""/> </p>
						</div>
						<div class="campo">
							<p>EAN-13 o Codigo de barra JAN:<input type="text" name="ean" size="13" value=""/> </p>
						</div>	
						<div class="campo">
							<p>Visible:<select name="visible">
								<option selected value="">--</option>
								<option  value="1">SI</option>
								<option  value="0">NO</option>
								</select> 
							</p>
						</div>	
					
					
					
					
					
					<div class="campo">
						<p>Material:<input type="text" name="producto[13]" value=""/> </p>
					</div>
					<div class="campo">
						<p>Tipo:<input type="text" name="producto[14]" value=""/> </p>
					</div>
					<div class="campo">
						<p>Disponibilidad:<input type="text" name="producto[16]" value=""/> </p>
					</div>	
					
					
					<div class="detalles">
						<p>Descripción Corta</p>
						<textarea name="descripcion_small"> </textarea>
					</div>
					<div class="detalles">
						<p>Descripción	</p>
						<textarea name="descripcion"> </textarea>
					</div>
					<div class="boton">
						<input type="submit" value="Guardar" name="guardar" />
					</div>
					</form>
				</div>	
			</div>	
			<div id="precio">
				<div class="fondo">
					<div id="opcion">
						<img src="" alt="informacion" /><h2>Precio</h2>
					</div>
					<form action="catalogo.php" method="POST">
						
						<div class="campo">
							<p>Categoria  <select name="producto[3]"> 
										<?php
											$sql = "SELECT * FROM categorias";
											$result = mysqli_query($link, $sql);
											While($row=mysqli_fetch_array($result)){
												$categoria = $row['categoria'];
												$id_categoria = $row['id_categoria'];
													echo"<option value=\"\">$categoria</option>";
													$sql2 = "SELECT * FROM sub_categorias WHERE id_categoria = '$id_categoria'";
													$result2 = mysqli_query($link, $sql2);
													While($row2=mysqli_fetch_array($result2)){
														$subcategoria = $row2['sub_categoria'];
														$id_subcategoria = $row2['id_sub_categoria'];
														
														echo"<option value=\"$id_subcategoria\">--- $subcategoria ($categoria)</option>";
													}
												
											}
										
										?>
									</select> </p>
							<p>Mostrado <select name="producto[11]">
									<option selected value="">--</option>
									<option  value="1">SI</option>
									<option  value="0">NO</option>
								</select>
							</p>
						</div>
					<div id="imagen">
						
					</div>
					<div id="title">
						<input type="file" name="foto" />
					</div>
					
					
					<div class="campo">
						<p>Precio Base:<input type="text" name="producto[7]" size="5" value=""/> </p>
					</div>	
					<div class="campo">
						<p>IVA:<select name="producto[9]">
							<?php
								$sql ="SELECT valor FROM impuestos";
								$result = mysqli_query($link, $sql);
								WHILE ($row=mysqli_fetch_array($result) ){
									$valor = $row['valor'];
									echo"<option value=\"$valor\">$valor</option>";
								}
							?>
						</select>
						</p>
					</div>	
					<div class="campo">
						<p>Precio Final:<input type="text" name="producto[8]" size="5" value=""/></p>
					</div>	
					<div class="campo">
						<p>Cantidad:<input type="text" name="producto[10]" value=""/> </p>
					</div>	
					<div class="campo">
						<p>Material:<input type="text" name="producto[13]" value=""/> </p>
					</div>
					<div class="campo">
						<p>Tipo:<input type="text" name="producto[14]" value=""/> </p>
					</div>
					<div class="campo">
						<p>Disponibilidad:<input type="text" name="producto[16]" value=""/> </p>
					</div>	
					
					
					<div class="detalles">
						<p>Detalles</p>
						<textarea name="producto[12]"> </textarea>
					</div>
					<div class="boton">
						<input type="submit" value="Guardar" name="guardar" />
					</div>
					</form>
				</div>
			</div>	
			<div id="asociados">
			
			</div>	
			<div id="cantidad">
			
			</div>	
			<div id="imagenes">
			
			</div>	
			<div id="proveedores">
			
			</div>
		</div>
	</main>
</body>
</html>