<?php

class Consultar_Tarifas{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		$this->consulta = mysqli_query($conexion, "SELECT * FROM tarifas WHERE descrip LIKE '%$codigo%'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
?>