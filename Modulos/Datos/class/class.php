<?php
class Proceso_Materia{
    var $id;      	var $nombre;   		var $estado;		var $conexion;
    
    function __construct($id, $nombre, $estado, $conexion){
        $this->id=$id;      	$this->nombre=$nombre;          $this->estado=$estado;			$this->conexion = $conexion;
    }
    
    function guardar(){
	    $id=$this->id;			$nombre=$this->nombre;		$estado=$this->estado;
			
        mysqli_query($this->conexion, "INSERT INTO materia (nombre, estado) 
                                  VALUES ('$nombre','$estado')");
								  
    }
	
	function actualizar(){
		$id=$this->id;			$nombre=$this->nombre;		$estado=$this->estado;
				
		mysqli_query($this->conexion, "UPDATE materia SET nombre='$nombre',
										estado='$estado'
								WHERE id='$id'");
	}
}

class Proceso_Salon{
    var $id;      	var $nombre;   	var $profesor;	var $grado;	var $estado;	var $conexion;
    
    function __construct($id, $nombre, $profesor, $grado, $estado, $conexion){
        $this->id=$id;      		$this->nombre=$nombre;          
		$this->profesor=$profesor;	$this->estado=$estado;		
		$this->grado=$grado;		$this->conexion = $conexion;
    }
    
    function guardar(){
	    $id=$this->id;				$nombre=$this->nombre;		$estado=$this->estado;
		$profesor=$this->profesor;	$grado=$this->grado;
			
        mysqli_query($this->conexion, "INSERT INTO salon (nombre, grado, profesor, estado) 
                                  VALUES ('$nombre','$grado','$profesor','$estado')");
								  
    }
	
	function actualizar(){
		 $id=$this->id;				$nombre=$this->nombre;		$estado=$this->estado;
		$profesor=$this->profesor;	$grado=$this->grado;
				
		mysqli_query($this->conexion, "UPDATE salon SET nombre='$nombre',
										grado='$grado',
										profesor='$profesor',
										estado='$estado'
								WHERE id='$id'");
	}
}

class Proceso_Grado{
    var $id;      	var $nombre;   		var $estado;		var $conexion;
    
    function __construct($id, $nombre, $estado, $conexion){
		$this->id=$id;      	$this->nombre=$nombre;          $this->estado=$estado;
		$this->conexion = $conexion;
    }
    
    function guardar(){
	    $id=$this->id;			$nombre=$this->nombre;		$estado=$this->estado;
			
        mysqli_query($this->conexion, "INSERT INTO grado (nombre, estado) 
                                  VALUES ('$nombre','$estado')");
								  
    }
	
	function actualizar(){
		$id=$this->id;			$nombre=$this->nombre;		$estado=$this->estado;
				
		mysqli_query($this->conexion, "UPDATE grado SET nombre='$nombre',
										estado='$estado'
								WHERE id='$id'");
	}
}
?>