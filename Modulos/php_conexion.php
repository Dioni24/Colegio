<?php
	global $conexion;
	$conexion = mysqli_connect('Localhost:3306', 'web', 'web', 'colegio');
	date_default_timezone_set("America/Bogota");
    mysqli_query($conexion, "SET NAMES utf8");
	mysqli_query($conexion, "SET CHARACTER_SET utf");
	$s='$';
	
	$paa=mysqli_query($conexion, "SELECT * FROM empresa WHERE id=1");					
	if($dato=mysqli_fetch_array($paa)){
		$maxima_nota=$dato['maxima'];
		$minima_nota=$dato['minima'];
	}
	
	
	function limpiar($tags){
		

		return $tags;
	}
	
?>