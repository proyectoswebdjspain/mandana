
<!DOCTYPE HTML>
<html>
<head>
<title>Mandana Grafic</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/favicon.ico" >
<link rel="icon" type="image/gif" href="images/animated_favicon1.gif" >
<script type="text/javascript" src="js/jquery.min.js">
</script><script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="slider/jquery.bxslider.min.js"></script>
<link href="slider/jquery.bxslider.css" rel="stylesheet" />
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			mode: 'fade',
			auto: true,
		});
	});

</script>

</head>
<body>
	<?php 
		include ("includes/menu.php");
	?>
	<main>
		<ul class="bxslider">
		  <li><img src="slider/images/Paisaje con Logo.png" /></li>
		  <li><img src="slider/images/Fundas.png" /></li>
		  <li><img src="slider/images/Sudadera Negra.png" /></li>
		  <li><img src="slider/images/Camiseta Negra.png" /></li>
		</ul>
	</main>
    <?php
		include("includes/footer.html");
		?>

</body>
</html>