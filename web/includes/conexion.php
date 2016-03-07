<?php

// datos para la conexion a mysql
$direccion = 'localhost';
$usuario = 'root';
$password = '';
$db='mandana';
									
$link=mysqli_connect($direccion,$usuario,$password,$db);//Conexión 
//or die("cannot connect"); //En caso de error
//mysqli_query ("SET NAMES 'utf8'");
?>
