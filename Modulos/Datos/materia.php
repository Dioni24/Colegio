<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
    include_once "../funciones.php";
    
    
    $routeprefix = "../../";
    $title = "Control de Materias";
    include_once "../../menu/header.php"; 
?>
    <div align="center">
    <table width="90%">
      <tr>
        <td>
        	<a href="index.php" class="text-info"><i class="icon-fast-backward"></i> <strong>Regresar</strong></a>
        	<table class="table table-bordered">
            	<tr class="info">
                	<td>
                  	    <div class="row-fluid">
                            <div class="span6">
                            	<h2 class="text-info">
                                    <img src="img/materia.png" width="80" height="80">
                                    Control de Materias
                                </h2>
                            </div>
                            <div class="span6">
                            	<form name="form1" method="post" action="">
                                	<div class="input-append">
                                	<input type="text" name="buscar" class="input-xlarge" autocomplete="off" autofocus placeholder="Buscar Materias">
                                    <button type="submit" class="btn"><strong><i class="icon-search"></i> Buscar</strong></button>
                                    </div>
                          	    </form>
                                <a href="#nuevo" role="button" class="btn" data-toggle="modal">
                                	<strong><i class="icon-plus"></i> Ingresar Nueva Materia</strong>
                                </a>
                                
                                <div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                                <form name="form1" method="post" action="">
                                    <div class="modal-header">
	                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	                                <h3 id="myModalLabel">Ingresar Nueva Materia</h3>
                                    </div>
                                    <div class="modal-body">
									    <div class="row-fluid">
	                                        <div class="span6">
                                        		<strong>Nombre de la Materia</strong><br>
                                                <input type="text" name="nombre" autocomplete="off" required value="">    
                                            </div>
    	                                    <div class="span6">
                                            	<strong>Estado de la Materia</strong><br>
                                                <select name="estado">
                                                	<option value="s">Activo</option>
                                                    <option value="n">No Activo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                	                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remover"></i> <strong>Cerrar</strong></button>
            	                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Guardar</strong></button>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                    	</div>
                    </td>
              	</tr>
            </table>
            <?php
				if(!empty($_POST['nombre'])){
					$nombre=limpiar($_POST['nombre']);		$estado=limpiar($_POST['estado']);
					if(empty($_POST['id'])){
						$oMateria=new Proceso_Materia('',$nombre,$estado, $conexion);
						$oMateria->guardar();
						echo mensajes('La Materia "'.$nombre.'" Registrada con Exito','verde');
					}else{
						$id=limpiar($_POST['id']);	
						$oMateria=new Proceso_Materia($id,$nombre,$estado, $conexion);
						$oMateria->actualizar();
						echo mensajes('La Materia "'.$nombre.'" Actualizada con Exito','verde');
					}
				}
			?>
            <table class="table table-bordered table-hover">
            	<tr class="info">
                	<td width="12%"><center><strong class="text-info">Codigo Materia</strong></center></td>
                    <td width="65%"><strong class="text-info">Nombre de la Materia</strong></td>
                    <td width="18%"><center><strong class="text-info">Estado</strong></center></td>
                    <td width="5%"></td>
                </tr>
                <?php
					if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pa=mysqli_query($conexion, "SELECT * FROM materia WHERE nombre LIKE '%$buscar%' or id='$buscar'");					
					}else{
						$pa=mysqli_query($conexion, "SELECT * FROM materia");				
					}
					
					while($row=mysqli_fetch_array($pa)){
				?>
                <tr>
                	<td><center><?php echo $row['id']; ?></center></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><center><?php echo estado($row['estado']); ?></center></td>
                    <td>
                    	<center>
                        	<a href="#a<?php echo $row['id']; ?>" title="Editar Materia" role="button" class="btn btn-mini" data-toggle="modal">
                            	<i class="icon-edit"></i>
                            </a>
                        </center>
                    </td>
                </tr>
                
               <div id="a<?php echo $row['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	            	<form name="form2" method="post" action="">
                    	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Actualizar Materia</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="span6">
                                    <strong>Nombre de la Materia</strong><br>
                                    <input type="text" name="nombre" autocomplete="off" required value="<?php echo $row['nombre']; ?>">    
                                </div>
                                <div class="span6">
                                    <strong>Estado de la Materia</strong><br>
                                    <select name="estado">
                                        <option value="s" <?php if($row['estado']=='s'){ echo 'selected'; } ?>>Activo</option>
                                        <option value="n" <?php if($row['estado']=='n'){ echo 'selected'; } ?>>No Activo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remover"></i> <strong>Cerrar</strong></button>
                            <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Guardar</strong></button>
                        </div>
                        </form>
                    </div>
                
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
