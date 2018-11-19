<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
	include_once "../funciones.php";
	include_once "../class_buscar.php";
	
	if(!empty($_GET['salon'])){
		$id_salon=$_GET['salon'];
	}else{
		header('Location:error.php');
	}
	
	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='p'){
		$profesor=limpiar($_SESSION['cod_user']);
		
		$pa=mysqli_query($conexion, "SELECT * FROM salon WHERE profesor='$profesor' and id='$id_salon'");				
		if($row=mysqli_fetch_array($pa)){
			$oGrado=new Consultar_Grado($row['grado'], $conexion);
			$nombre_salon=$oGrado->consultar('nombre').'.'.$row['nombre'];
		}else{
			header('Location:error.php');
		}
		
	}else{
		header('Location:error.php');
	}
  
  
  $routeprefix = "../../";
  $title = "Control de Calificacion";
  include_once "../../menu/header.php"; 
?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
        		<table class="table table-bordered">
                  <tr class="info">
                    <td>
						<h2><img src="img/calificar.png" width="80" height="80">Listado de Alumnos Salon "<?php echo $nombre_salon; ?>"</h2>
                    </td>
                  </tr>
                </table> 
                
                <table class="table table-bordered">
                  <tr class="info">
                    <td width="15%"><strong>Codigo</strong></td>
                    <td colspan="2"><strong>Nombres</strong></td>
                  </tr>
                  <?php 
				  	$pa=mysqli_query($conexion, "SELECT * FROM alumnos WHERE salon='$id_salon' ORDER BY nombre");				
					while($row=mysqli_fetch_array($pa)){
						$cod_alumno=$row['doc'];#5
						
				  ?>
                  <tr>
                  	<td><?php echo $row['doc']; ?></td>
                    <td width="80%">
                    	<a href="valorar.php?cod=<?php echo $cod_alumno; ?>" title="Valorar Alumno">
							<?php echo $row['nombre']; ?>
                        </a>
					</td>
                  </tr>  
                  <?php } ?>
                </table>   	
            </td>
          </tr>
        </table>

    </div>

<?php 
    $script = "";
    include_once "../../menu/footer.php"; 
?>