<?php
	
	$conexion = mysqli_connect('Localhost:3306', 'root', 'dioni2424', 'colegio');
	date_default_timezone_set("America/Bogota");
    mysqli_query($conexion, "SET NAMES utf8");
	mysqli_query($conexion, "SET CHARACTER_SET utf");
	$s='$';
	
	function limpiar($tags){
		$tags = strip_tags($tags);
		$tags = stripslashes($tags);
		$tags = htmlentities($tags);
		return $tags;
	}

	
?>