<?php 
	include_once "php_conexion.php";
	include_once "class/class.php";
	include_once "class/funciones.php";
	
	if(!empty($_GET['estado'])){
		$nit=limpiar($_GET['estado']);
	  	$cans=mysqli_query($conexion, "SELECT * FROM tarifas WHERE id='$nit'");
	  	if($dat=mysqli_fetch_array($cans)){
        	if($dat['estado']=='s'){
		  		$xSQL="Update tarifas Set estado='n' Where id='$nit'";
		  		mysqli_query($conexion, $xSQL);
		  		header('location:tarifas.php');
            }else{
				$xSQL="Update tarifas Set estado='s' Where id='$nit'";
				mysqli_query($conexion, $xSQL);
				header('location:tarifas.php');
            }	
	  	}
	}
  include_once "menu/header.php"; 
?>
  <div align="center">
    <table width="90%">
      <tr>
        <td>
        	<div align="right">
			  <a href="#nuevo" role="button" class="btn" data-toggle="modal"><i class="icon-plus"></i><strong> Nuevo Registro</strong></a>
            </div><br>
            <?php 
				if(!empty($_POST['valor'])){
					$tiempo=limpiar($_POST['tiempo']);				$valor=limpiar($_POST['valor']);
					$descrip=limpiar($_POST['descrip']);			$estado=limpiar($_POST['estado']);
					
					if(empty($_POST['id'])){
						$objGuardar=new Proceso_Tarifas($tiempo,$descrip,$valor,'',$estado,$conexion);
						$objGuardar->guardar();
						echo mensajes('Registro Guardado con Exito','verde');
					}else{
						$id=limpiar($_POST['id']);
						$objGuardar=new Proceso_Tarifas($tiempo,$descrip,$valor,$id,$estado,$conexion);
						$objGuardar->actualizar();
						echo mensajes('Registro Actualizado con Exito','verde');
					}
				}
			?>
        	<table class="table table-bordered table table-hover">
              <tr class="info">
                <td><strong>Tiempo</strong></td>
                <td><strong>Descripcion</strong></td>
                <td><strong>Valor</strong></td>
                <td><center><strong>Estado</strong></center></td>
                <td>&nbsp;</td>
              </tr>
              <?php 
			  	$cans=mysqli_query($conexion, "SELECT * FROM tarifas");
                while($row=mysqli_fetch_array($cans)){
			  ?>
              <tr>
                <td><?php echo $row['tiempo']; ?></td>
                <td><?php echo $row['descrip']; ?></td>
                <td>$ <?php echo formato($row['valor']); ?></td>
                <td>
                	<center>
                        <a href="tarifas.php?estado=<?php echo $row['id']; ?>" title="Cambiar Estado">
	                        <?php echo estado($row['estado']); ?>
                        </a>
                    </center>
                </td>
                <td>
                	<center>
	                	<a href="#m<?php echo $row['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
                    </center>
                
                </td>
              </tr>
 	          <div id="m<?php echo $row['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form1" method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	                <h3 id="myModalLabel">Actualizar Registro</h3>
                    </div>
                    <div class="modal-body">
        	            <div class="row-fluid">
                            <div class="span6">
                                <strong>Tiempo/Duracion</strong><br>
                                <input type="text" name="tiempo" autocomplete="off" required value="<?php echo $row['tiempo']; ?>"><br>
                                <strong>Valor</strong><br>
                                <div class="input-prepend input-append">
                                    <span class="add-on"><strong>$</strong></span>
                                    <input type="number" class="input-medium" name="valor" min="1" value="<?php echo $row['valor']; ?>" autocomplete="off" required>
                                    <span class="add-on"><strong>.00</strong></span>
                                </div>
                            </div>
                            <div class="span6">
                                <strong>Descripcion de la Operacion</strong><br>
                                <input type="text" name="descrip" autocomplete="off" required value="<?php echo $row['descrip']; ?>"><br>
                                <strong>Estado</strong><br>
                                <select name="estado">
                                    <option value="s" <?php if($row['estado']=='s'){echo 'selected';} ?>>Activo</option>
                                    <option value="n" <?php if($row['estado']=='n'){echo 'selected';} ?>>No Activo</option>
                                </select>  
                            </div>
                    	</div>
                    </div>
                    <div class="modal-footer">
            	        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
                	    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Guardar Cambios</strong></button>
                    </div>
                    </form>
                </div>
              <?php } ?>
            </table>

        </td>
      </tr>
    </table>
	</div>
    
    		<div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            	<form name="form1" method="post" action="">
                <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	            <h3 id="myModalLabel">Nuevo Registro</h3>
                </div>
                <div class="modal-body">
        	        <div class="row-fluid">
                    	<div class="span6">
                        	<strong>Tiempo/Duracion</strong><br>
                            <input type="text" name="tiempo" autocomplete="off" required><br>
                            <strong>Valor</strong><br>
                            <div class="input-prepend input-append">
								<span class="add-on"><strong>$</strong></span>
	                            <input type="number" class="input-medium" name="valor" min="1" autocomplete="off" required>
                                <span class="add-on"><strong>.00</strong></span>
							</div>
                        </div>
                    	<div class="span6">
                        	<strong>Descripcion de la Operacion</strong><br>
                           	<input type="text" name="descrip" autocomplete="off" required><br>
                            <strong>Estado</strong><br>
							<select name="estado">
                            	<option value="s">Activo</option>
                                <option value="n">No Activo</option>
                            </select>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
            	    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
                	<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Guardar</strong></button>
                </div>
                </form>
            </div>

<?php 
    $script = "";
    include_once "menu/footer.php"; 
?>
            