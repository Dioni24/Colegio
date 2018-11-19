<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
	include_once "../funciones.php";
	
	
  $routeprefix = "../../";
    $title = "Informacion Empresa";
    include_once "../../menu/header.php"; 
?>
    <div align="center">
    <table width="60%">
      <tr>
        <td>
        
        	<table class="table table-bordered">
              <tr class="info">
                <td><center><h1 class="text-info">Informacion Empresa</h1></center></td>
              </tr>
            </table>

        
        </td>
      </tr>
    </table>
    <table width="60%">
      <tr>
        <td>
       	    <div class="row-fluid">
	            <div class="span6">
                	<a href="index.php" class="text-info"><i class="icon-fast-backward"></i> <strong>Regresar</strong></a>
                </div>
    	        <div class="span6" align="right">
                	<a href="#myModal" role="button" class="btn" data-toggle="modal"><strong>Actualizar Informacion</strong></a>
                </div>
            </div><br>
             <?php
				if(!empty($_POST['empresa']) and !empty($_POST['nit'])){
					$empresa=limpiar($_POST['empresa']);		$nit=limpiar($_POST['nit']);
					$pais=limpiar($_POST['pais']);				$tel=limpiar($_POST['tel']);
					$ciudad=limpiar($_POST['ciudad']);			$fax=limpiar($_POST['fax']);
					$direccion=limpiar($_POST['direccion']);	$web=limpiar($_POST['web']);
					$correo=limpiar($_POST['correo']);			$fecha=date('Y-m-d');
					$minima=limpiar($_POST['minima']);			$maxima=limpiar($_POST['maxima']);
					$moneda=limpiar($_POST['moneda']);
					mysqli_query($conexion, "UPDATE empresa SET empresa='$empresa',
													pais='$pais',
													ciudad='$ciudad',
													direccion='$direccion',
													correo='$correo',
													moneda='$moneda',
													nit='$nit',
													tel='$tel',
													fax='$fax',
													web='$web',
													fecha='$fecha',
													minima='$minima',
													maxima='$maxima'
												WHERE id=1");

					echo mensajes('Dato de la Empresa Actualizado con Exito','verde');
					
					
				}
				
				$pa=mysqli_query($conexion, "SELECT * FROM empresa WHERE id=1");									
				$row=mysqli_fetch_array($pa);
			?>
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <form name="form1" method="post" action="">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Actualizar Informacion Empresa</h3>
                </div>
                <div class="modal-body"> 
					<div class="row-fluid">
                    	<div class="span6">
                        	<strong>Nombre Empresa</strong><br>
                            <input type="text" name="empresa" autocomplete="off" required value="<?php echo $row['empresa']; ?>"><br>
                            <strong>Pais</strong><br>
                            <input type="text" name="pais" autocomplete="off" required value="<?php echo $row['pais']; ?>"><br>
                            <strong>Ciudad</strong><br>
                            <input type="text" name="ciudad" autocomplete="off" required value="<?php echo $row['ciudad']; ?>"><br>
                            <strong>Direccion</strong><br>
                            <input type="text" name="direccion" autocomplete="off" required value="<?php echo $row['direccion']; ?>"><br>
                            <strong>Correo</strong><br>
                            <input type="email" name="correo" autocomplete="off" required value="<?php echo $row['correo']; ?>"><br>
                            <strong>Nota Minima</strong><br>
                            <input type="number" name="minima" autocomplete="off" required value="<?php echo $row['minima']; ?>"><br>
                        </div>
                    	<div class="span6">
                        	<strong>Nit</strong><br>
                            <input type="text" name="nit" autocomplete="off" required value="<?php echo $row['nit']; ?>"><br>
                            <strong>Telefonos</strong><br>
                            <input type="text" name="tel" autocomplete="off" required value="<?php echo $row['tel']; ?>"><br>
                            <strong>Fax</strong><br>
                            <input type="text" name="fax" autocomplete="off" required value="<?php echo $row['fax']; ?>"><br>
                            <strong>Pagina WEB</strong><br>
                            <input type="text" name="web" autocomplete="off" required value="<?php echo $row['web']; ?>"><br>
                             <strong>Moneda</strong><br>
                            <input type="text" name="moneda" autocomplete="off" required value="<?php echo $row['moneda']; ?>"><br>
                            <strong>Nota Maxima</strong><br>
                            <input type="number" name="maxima" autocomplete="off" required value="<?php echo $row['maxima']; ?>"><br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
                    <button class="btn btn-primary"><i class="icon-ok"></i> <strong>Actualizar</strong></button>
                </div>
                </form>
            </div>
        	<table class="table table-bordered">
              <tr>
                <td>
                    <div class="row-fluid">
                    	<div class="span6">
                        	<i class="icon-ok"></i> <strong>Nombre: </strong><?php echo $row['empresa']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Pais: </strong><?php echo $row['pais']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Ciudad: </strong><?php echo $row['ciudad']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Direccion: </strong><?php echo $row['direccion']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Correo: </strong><?php echo $row['correo']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Nota Minima: </strong><?php echo $row['minima']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Moneda: </strong><?php echo $row['moneda']; ?>
                        </div>
                    	<div class="span6">
                        	<i class="icon-ok"></i> <strong>Nit: </strong><?php echo $row['nit']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Telefono: </strong><?php echo $row['tel']; ?><br><br>
                            <i class="icon-ok"></i> <strong>FAX: </strong><?php echo $row['fax']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Pagina Web: </strong><?php echo $row['web']; ?><br><br>
                            <i class="icon-ok"></i> <strong>Ultima Actualizacion: </strong><?php echo fecha($row['fecha']); ?><br><br>
                            <i class="icon-ok"></i> <strong>Nota Maxima: </strong><?php echo $row['maxima']; ?>
                        </div>
                    </div>
                   
                </td>
              </tr>
            </table>
            
        </td>
      </tr>
    </table>
    </div>



<?php 
    $script = "";
    include_once "../../menu/footer.php"; 
?>
