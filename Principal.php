<?php 
	session_start();
	include_once "Modulos/php_conexion.php";
	include_once "Modulos/class_buscar.php";
	include_once "Modulos/funciones.php";
	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='p'){
		$profesor=limpiar($_SESSION['cod_user']);
		$oProfesor=new Consultar_Profesor($profesor, $conexion);
		$nombre_profesor=$oProfesor->consultar('ape').' '.$oProfesor->consultar('nom');
	}else{
		header('Location:error.php');
  }
  
  $title = "Dashboard";
  include_once "menu/header.php"; 
?>
<br><br>
	<div align="center">
    	<h2><?php echo $nombre_profesor; ?></h2>
    	<table width="30%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="info">
                    <td colspan="2"><h2 align="center"><img src="img/salon.png" width="80" height="80">Mis Salones</h2></td>
                  </tr>
                  <?php 
				  	$pa=mysqli_query($conexion, "SELECT * FROM salon WHERE profesor='$profesor' order by nombre");				
					while($row=mysqli_fetch_array($pa)){
						$url=$row['id'];
				  ?>
                  <tr>
                    <td>
                    	<div align="center">
                        	<a href="Modulos/Calificar/index.php?salon=<?php echo $url; ?>" title="Ir a Valorar Alumnos" class="btn">
                        		<strong><i class="icon-ok"></i> <?php echo $row['nombre']; ?></strong>
                            </a>
                        </div>
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
    include_once "menu/footer.php"; 
?>
