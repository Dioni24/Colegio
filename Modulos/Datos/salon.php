<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
	include_once "../class_buscar.php";
    include_once "../funciones.php";
    
    
    $routeprefix = "../../";
    $title = "Control de Aulas";
    include_once "../../menu/header.php"; 
?>
    <div align="center">
    	<table width="90%" >
          <tr>
            <td>
            	<a href="index.php" class="text-info"><i class="icon-fast-backward"></i> <strong>Regresar</strong></a>
            	<table class="table table-bordered">
                  <tr class="info">
                    <td>
                    
                    	<div class="row-fluid">
                            <div class="span6">
                            	<h2 class="text-info">
                                    <img src="img/salon.png" width="80" height="80">
                                    Control de Salones
                                </h2>
                            </div>
                            <div class="span6">
                            	<form name="form1" method="post" action="">
                                	<div class="input-append">
                                	<input type="text" name="buscar" class="input-xlarge" autocomplete="off" autofocus placeholder="Buscar Salon">
                                    <button type="submit" class="btn"><strong><i class="icon-search"></i> Buscar</strong></button>
                                    </div>
                          	    </form>
                                <a href="#nuevo" role="button" class="btn" data-toggle="modal">
                                	<strong><i class="icon-plus"></i> Ingresar Nuevo Salon</strong>
                                </a>
                                
                                <div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                	<form name="form1" method="post" action="">
                                    <div class="modal-header">
    	                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                                    <h3 id="myModalLabel">Ingresar Nuevo Salon</h3>
                                    </div>
                                    <div class="modal-body">
										<div class="row-fluid">
                                            <div class="span6">
                                            	<strong>Nombre del Salon</strong><br>
                                                <input type="text" name="nombre" autocomplete="off" required value=""><br>
                                                <strong>Grado</strong><br>
                                                <select name="grado">
                                                	<?php
														$sal=mysqli_query($conexion, "SELECT * FROM grado WHERE estado='s'");				
														while($col=mysqli_fetch_array($sal)){
															echo '<option value="'.$col['id'].'">'.$col['nombre'].'</option>';
														}
													?>
                                                </select>
                                            </div>
                                            <div class="span6">
                                            	<strong>Encargado</strong><br>
                                                <select name="profesor">
                                                	<?php
														$sl=mysqli_query($conexion, "SELECT * FROM profesor WHERE estado='s'");				
														while($cl=mysqli_fetch_array($sl)){
															echo '<option value="'.$cl['doc'].'">'.$cl['ape'].' '.$cl['nom'].'</option>';
														}
													?>
                                                </select><br>
                                                <strong>Estado</strong><br>
                                                <select name="estado">
                                                	<option value="s">Activo</option>
                                                    <option value="n">No Activo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
                                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Guardar</strong></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                  </tr>
				</table>
            </td>
          </tr>
        </table>
        <?php 
			if(!empty($_POST['nombre'])){
				$nombre=limpiar($_POST['nombre']);	$profesor=limpiar($_POST['profesor']);
				$grado=limpiar($_POST['grado']);	$estado=limpiar($_POST['estado']);
				
				if(empty($_POST['id'])){
					$oSalon=new Proceso_Salon('',$nombre,$profesor,$grado,$estado,$conexion);
					$oSalon->guardar();
					echo mensajes('El Salon "'.$nombre.'" Ha sido Guardado con Exito','verde');
				}else{
					$id=limpiar($_POST['id']);
					$oSalon=new Proceso_Salon($id,$nombre,$profesor,$grado,$estado, $conexion);
					$oSalon->actualizar();
					echo mensajes('El Salon "'.$nombre.'" Ha sido Actualizado con Exito','verde');
				}
			}
		?>
        <table width="90%" >
          <tr>
            <td>
            	<table class="table table-bordered table table-hover">
                  <tr class="info">
                    <td width="11%"><center><strong class="text-info">Codigo Salon</strong></center></td>
                    <td width="23%"><strong class="text-info">Nombre del Salon</strong></td>
                    <td width="12%"><center><strong class="text-info">Grado</strong></center></td>
                    <td width="37%"><strong class="text-info">Encargado</strong></td>
                    <td width="13%"><center><strong class="text-info">Estado</strong></center></td>
                    <td width="4%">&nbsp;</td>
                  </tr>
                  <?php
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pa=mysqli_query($conexion, "SELECT * FROM salon WHERE nombre LIKE '%$buscar%' or id='$buscar'");					
					}else{
						$pa=mysqli_query($conexion, "SELECT * FROM salon");				
					}
					while($row=mysqli_fetch_array($pa)){
						$oGrado=new Consultar_Grado($row['grado'], $conexion);
						$oProfesor=new Consultar_Profesor($row['profesor'], $conexion);
				  ?>
                  <tr>
                    <td><center><?php echo $row['id']; ?></center></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><center><?php echo $oGrado->consultar('nombre'); ?></center></td>
                    <td><?php echo $oProfesor->consultar('ape').' '.$oProfesor->consultar('nom'); ?></td>
                    <td><center><?php echo estado($row['estado']); ?></center></td>
                    <td>
                    	<center>
                        	<a href="#a<?php echo $row['id']; ?>" title="Editar Salon" role="button" class="btn btn-mini" data-toggle="modal">
                            	<i class="icon-edit"></i>
                            </a>
                        </center>
                        
                        <div id="a<?php echo $row['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <form name="form1" method="post" action="">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel">Actualizar Salon</h3>
                          </div>
                          <div class="modal-body">
                              <div class="row-fluid">
                                  <div class="span6">
                                      <strong>Nombre del Salon</strong><br>
                                      <input type="text" name="nombre" autocomplete="off" required value="<?php echo $row['nombre']; ?>"><br>
                                      <strong>Grado</strong><br>
                                      <select name="grado">
                                          <?php
                                              $sal=mysqli_query($conexion, "SELECT * FROM grado WHERE estado='s'");				
                                              while($col=mysqli_fetch_array($sal)){
												  if($col['id']==$row['grado']){
                                                  		echo '<option value="'.$col['id'].'" selected>'.$col['nombre'].'</option>';
												  }else{
														echo '<option value="'.$col['id'].'">'.$col['nombre'].'</option>';  
												  }
                                              }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="span6">
                                      <strong>Encargado</strong><br>
                                      <select name="profesor">
                                          <?php
                                              $sl=mysqli_query($conexion, "SELECT * FROM profesor WHERE estado='s'");				
                                              while($cl=mysqli_fetch_array($sl)){
												  if($cl['doc']==$row['profesor']){
	                                                  echo '<option value="'.$cl['doc'].'" selected>'.$cl['ape'].' '.$cl['nom'].'</option>';
												  }else{
													  echo '<option value="'.$cl['doc'].'">'.$cl['ape'].' '.$cl['nom'].'</option>';
												  }
                                              }
                                          ?>
                                      </select><br>
                                      <strong>Estado</strong><br>
                                      <select name="estado">
                                          <option value="s" <?php if($row['estado']=='s'){ echo 'selected'; } ?>>Activo</option>
                                          <option value="n" <?php if($row['estado']=='n'){ echo 'selected'; } ?>>No Activo</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
                              <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Actualizar</strong></button>
                          </div>
                          </form>
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
    include_once "../../menu/footer.php"; 
?>
