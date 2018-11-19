<?php 
	session_start();
	include_once "Modulos/php_conexion.php";
	include_once "Modulos/funciones.php";
	include_once "Modulos/class_buscar.php";
	include_once "Modulos/Profesor/class/class.php";
	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='p'){
		$usu=limpiar($_SESSION['cod_user']);
	}else{
		header('Location:error.php');
	}

  $title = Perfil;
  include_once "menu/header.php"; 
?>
	
    <div align="center">
    	<table width="50%">
          <tr>
            <td>
            	<?php
					if(!empty($_POST['ape']) and !empty($_POST['nom'])){
						$nom=limpiar($_POST['nom']);					$ape=limpiar($_POST['ape']);
						$doc=limpiar($_POST['doc']);					$fecha=limpiar($_POST['fecha']);
						$dir=limpiar($_POST['dir']);					$tel=limpiar($_POST['tel']);
						$cel=limpiar($_POST['cel']);					$correo=limpiar($_POST['correo']);
						$especialidad=limpiar($_POST['especialidad']);	
						
						mysqli_query($conexion, "UPDATE profesor SET nom='$nom',
										ape='$ape',
										fecha='$fecha',
										dir='$dir',
										tel='$tel',
										cel='$cel',
										correo='$correo',
										especialidad='$especialidad'
								WHERE doc='$doc'");
						echo mensajes('Informacion Actualizada con Exito','verde');
						
						
					}
					$oProfesor=new Consultar_Profesor($usu, $conexion);
				?>
                <table class="table table-bordered">
                  <tr class="info">
                    <td>
                    	<h1 align="center"><img src="img/act.jpg" width="100" height="100" class="img-circle img-polaroid"> Actualizar Informacion</h1>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    	<form name="form1" method="post" action="">
                        <div class="row-fluid">
                            <div class="span6">
	<strong>Documento</strong><br>
    <input type="text" name="doc" class="input-xlarge" autocomplete="off" readonly value="<?php echo $usu; ?>"><br>
    <strong>Nombres</strong><br>
    <input type="text" name="nom" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('nom'); ?>"><br>
    <strong>Apellidos</strong><br>
    <input type="text" name="ape" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('ape'); ?>"><br>
    <strong>Fecha de Nacimiento</strong><br>
    <input type="date" name="fecha" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('fecha'); ?>"><br>
    <strong>Direccion de Residencia</strong><br>
    <input type="text" name="dir" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('dir'); ?>"><br>
                          </div>
                            <div class="span6">
	<strong>Telefonos</strong><br>
    <input type="text" name="tel" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('tel'); ?>"><br>
    <strong>Celulares</strong><br>
    <input type="text" name="cel" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('cel'); ?>"><br>
    <strong>Correo Electronico</strong><br>
    <input type="email" name="correo" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('correo'); ?>"><br>
    <strong>Especialidades</strong><br>
    <input type="text" name="especialidad" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('especialidad'); ?>"><br>
    <strong>Tipo de Usuario</strong><br>
    <?php 
		if($oProfesor->consultar('tipo')=='a'){
			$tipo='Administrador';
		}else{
			$tipo='Profesor';
		}
	?>
    <input type="text" name="dir" class="input-xlarge" autocomplete="off" readonly value="<?php echo $tipo; ?>"><br><br>
    <div align="right"><button type="submit" class="btn btn-primary">Actualizar Informacion</button></div>
                          </div>
                        </div>
                        </form>
                    </td>
                  </tr>
                </table>
            </td>
          </tr>
        </table>

    </div>

<?php 
    $script = "";
    include_once "menu/footer.php"; 
?>
    