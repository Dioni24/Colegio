<?php

class Proceso_Calificar{
    var $id;    	var $materia;      var $alumno;       	var $actividad;		var $valor;
	var $periodo;	var $fecha;			var $conexion;
    
    function __construct($id, $materia, $alumno, $actividad, $valor, $periodo, $fecha, $conexion){
        $this->id=$id;      		$this->materia=$materia;    
		$this->alumno=$alumno;		$this->actividad=$actividad;  
		$this->valor=$valor;		$this->periodo=$periodo;			
		$this->fecha=$fecha;		$this->conexion = $conexion;
    }
    
    function guardar(){
        $id=$this->id;				$materia=$this->materia;	
		$alumno=$this->alumno;		$actividad=$this->actividad;		
		$valor=$this->valor;		$periodo=$this->periodo;			$fecha=$this->fecha;
			
        mysqli_query($this->conexion, "INSERT INTO notas (materia, alumno, actividad, valor, periodo, fecha) 
                                  VALUES ('$materia','$alumno','$actividad','$valor','$periodo','$fecha')");
								  
    }
	
	function actualizar(){
       	$id=$this->id;				$materia=$this->materia;	
		$alumno=$this->alumno;		$actividad=$this->actividad;		
		$valor=$this->valor;		$periodo=$this->periodo;			$fecha=$this->fecha;
		
		mysqli_query($this->conexion, "UPDATE notas SET valor='$valor' WHERE id='$id'");
	}
}
?>