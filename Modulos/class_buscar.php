<?php

class Consultar_Actividad{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM actividad WHERE id='$codigo'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_Materias{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM materia WHERE id='$codigo'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Consultar_Profesor{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM profesor WHERE doc='$codigo'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Consultar_Grado{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM grado WHERE id=$codigo");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Consultar_Salon{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM salon WHERE id=$codigo");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo, $conexion){
		return $this->fetch[$campo];
	}
}

class Consultar_Empresa{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM empresa WHERE id='$codigo'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Consultar_Periodo{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM periodo WHERE id='$codigo'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Consultar_Alumno{
	private $consulta;
	private $fetch;
	
	function __construct($codigo, $conexion){
		include_once "php_conexion.php";
		$this->consulta = mysqli_query($conexion, "SELECT * FROM alumnos WHERE doc='$codigo'");
		$this->fetch = mysqli_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
?>