<div class="header-top">
	 <div class="wrap"> 
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""/></a>
	   </div>
	    <div class="cssmenu">
		   <ul>
			 <li><a href=""><img src="images/carro.png" alt=""/></a></li> 
			 <li class="espacio"><a href=""><img src="images/login.png" alt=""/></a></li> 
		   </ul>
		</div>
 	</div>
</div>
   <div class="header-bottom">
   	<div class="wrap">
   		<!-- start header menu -->
		<ul class="megamenu skyblue">
			<?php
				include('includes/conexion.php');
				$sql = "SELECT * FROM categorias";
				$result = mysqli_query($link, $sql);
				WHILE($row=mysqli_fetch_array($result)){ // Obtencion de las categorias del menu desplegable
					$categoria = $row['categoria'];
					$idcategoria = $row['id_categoria']?>
					<li><a class="color1" href="#"><?php echo $categoria; ?></a>
						<div class="megapanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										<ul>
											<?php
												$sql1 = "SELECT * FROM sub_categorias WHERE id_categoria = $idcategoria AND visibilidad = 1 ";
												$result1 = mysqli_query($link, $sql1);
												WHILE($row1=mysqli_fetch_array($result1)){ // Obtencion de las opciones para cada categoria del menu desplegable
													$subcategoria = $row1['sub_categoria']; 
													$idsubcategoria = $row1['id_sub_categoria'];
													
													echo "<li><a href=\"\">$subcategoria</a></li>";
												}	
											?>
										</ul>	
									</div>
								</div>
								<!-- Aqui se puede colocar una imagen para el menu -->
							</div>
						</div>
					</li>				
			<?php } ?>
		  </ul>
		   <div class="clear"></div>
     	</div>
       </div>