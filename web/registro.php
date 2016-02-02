
<!DOCTYPE HTML>
<html>
<head>
<title>Mandana Grafic</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/registro.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/favicon.ico" >
<link rel="icon" type="image/gif" href="images/animated_favicon1.gif" >
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<!-- top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
	<?php 
		include ("includes/menu.html");
	?>
	<main>
		<div class="container">
			<section id="content">
				<h1>Registrate en nuestro sistema</h1>
				<form method=”post” id=”form1″>
						<label for=”name”>Nombre: <span class=”required”>*</span></label><br>
						<input type=”text” id=”name” name=”name” value=”” placeholder=”José García” required autofocus />
					<br>
						<label for=”email”>Dirección de correo: <span class=”required”>*</span></label><br>
						<input type=”email” id=”email” name=”email” placeholder=”pepegarcia@ejemplo.com” required />
					<br>
						<label for=”telefono”>Teléfono: </label><br>
						<input type=”tel” id=”telefono” name=”telefono” placeholder=”555-12345″ />
					<br>
						<label for=”telefono”>Contraseña: <span class=”required”>*</span></label><br>
						<input id=”pass” name=”pass” type=”password” required />
					<br>
						<label for=”telefono”>Repetir contraseña: <span class=”required”>*</span></label><br>
						<input id=”pass2″ name=”pass2″ type=”password” required />
					<br>
						<label for=”opciones”>Opciones: </label><br>
						<select id=”opciones” name=”opciones”>
						<option value=”opcion1″>Opción 1</option>
						<option value=”opcon2″>Opción 2</option>
						<option value=”opcion3″ >Opción 3</option>
					</select>
					<br>
					<input type="submit" value="Enviar" />
					<p id=”req-field-desc”><span class=”requerido”>*</span> rellenar obligatoriamente</p>
				</form>
			</section><!-- content -->
		</div><!-- container -->
	</main>
    <?php
		include("includes/footer.html");
		?>
       <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>