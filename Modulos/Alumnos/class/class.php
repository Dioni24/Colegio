<?php

class Proceso_Alumno{
    var $doc;    		var $nombre;      var $grado;       	var $salon;		var $tipo;
    var $fecha;      	var $direccion;   var $telefono;      	var $estado;	var $matricula;
    var $conexion;
    function __construct($doc, $nombre, $grado, $salon, $fecha, $direccion, $telefono, $estado, $matricula, $tipo, $conexion){
        $this->doc=$doc;      	$this->nombre=$nombre;          $this->grado=$grado;        $this->salon=$salon;	$this->tipo=$tipo;
        $this->fecha=$fecha;    $this->direccion=$direccion;    $this->telefono=$telefono;  $this->estado=$estado;	$this->matricula=$matricula;	
		$this->conexion = $conexion;
    }
    
    function guardar(){
        $doc=$this->doc;		$nombre=$this->nombre;			$grado=$this->grado;		$salon=$this->salon;	$tipo=$this->tipo;
		$fecha=$this->fecha;	$direccion=$this->direccion;	$telefono=$this->telefono;	$estado=$this->estado;	$matricula=$this->matricula;
			
        mysqli_query($this->conexion, "INSERT INTO alumnos (doc, nombre, grado, salon, tipo, fecha, direccion, telefono, estado, matricula) 
                                  VALUES ('$doc','$nombre','$grado','$salon','$tipo','$fecha','$direccion','$telefono','$estado','$matricula')");
								  
    }
	
	function actualizar(){
        $doc=$this->doc;		$nombre=$this->nombre;			$grado=$this->grado;		$salon=$this->salon;	$tipo=$this->tipo;
		$fecha=$this->fecha;	$direccion=$this->direccion;	$telefono=$this->telefono;	$estado=$this->estado;	$matricula=$this->matricula;
		
		mysqli_query($this->conexion, "UPDATE alumnos SET nombre='$nombre',
										grado='$grado',
										salon='$salon',
										tipo='$tipo',
										fecha='$fecha',
										direccion='$direccion',
										telefono='$telefono',
										estado='$estado',
										matricula='$matricula'
								WHERE doc='$doc'");
	}
}
?>