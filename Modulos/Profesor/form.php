<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
    include_once "../funciones.php";

    $id=0;
    $nom="";
    $ape="";
    $doc="";
    $fecha="";
    $dir="";
    $tel="";
    $cel="";
    $correo="";
    $especialidad="";
    $estado="s";
    $tipo="p";
    $con="";

    if(isset($_GET['id']) and (empty($_POST['doc']) or empty($_POST['nom'])))
    {
        $id=$_GET['id'];
        $p=mysqli_query($conexion, "SELECT * FROM profesor WHERE id = ".$id);
        if ($p->num_rows > 0)
        {
            $row=mysqli_fetch_array($p);
            $nom=$row['nom'];
            $ape=$row['ape'];
            $doc=$row['doc'];
            $fecha=$row['fecha'];
            $dir=$row['dir'];
            $tel=$row['tel'];
            $cel=$row['cel'];
            $correo=$row['correo'];
            $especialidad=$row['especialidad'];
            $estado=$row['estado'];
            $tipo=$row['tipo'];
            $con=$row['con'];
        }
    }
    
    if(!empty($_POST['doc']) and !empty($_POST['nom'])){
        $nom=limpiar($_POST['nom']);		$ape=limpiar($_POST['ape']);
        $doc=limpiar($_POST['doc']);		$fecha=limpiar($_POST['fecha']);
        $dir=limpiar($_POST['dir']);		$tel=limpiar($_POST['tel']);
        $cel=limpiar($_POST['cel']);		$correo=limpiar($_POST['correo']);
        $especialidad=limpiar($_POST['especialidad']);	$estado=limpiar($_POST['estado']);
        $tipo=limpiar($_POST['tipo']);		$con=$doc;
        if($id == 0){
            $oProfesor=new Proceso_Profesor('', $nom, $ape, $doc, $fecha, $dir, $tel, $cel, $correo, $especialidad, $estado, $tipo, $con, $conexion);
            $oProfesor->guardar();
            echo mensajes('El Profesor "'.$nom.' '.$ape.'" Ha sido Guardado con Exito','verde');
        }else{
            $oProfesor=new Proceso_Profesor($id,$nom, $ape, $doc, $fecha, $dir, $tel, $cel, $correo, $especialidad, $estado, $tipo, $con, $conexion);
            $oProfesor->actualizar();
            echo mensajes('El Profesor "'.$nom.' '.$ape.'" Ha sido Actualizado con Exito','verde');
        }
        header('location: index.php');
    }

    $routeprefix = "../../";
    $title = "Control de Profesores";
    include_once "../../menu/header.php"; 
?>

                    <div class="m-content">
						<div class="row">
							<div class="col-lg-12">
                                <div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Registro de Profesor
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="form.php?id=<?php echo $id ?>" method="POST" >
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Documento:
												</label>
												<div class="col-lg-3">
													<input type="text" class="form-control m-input" name="doc" value="<?php echo $doc; ?>">
													<span class="m-form__help">
														Documento del Profesor
													</span>
												</div>
                                                <label class="col-lg-2 col-form-label">
													Nombre:
												</label>
												<div class="col-lg-3">
													<input type="text" class="form-control m-input" name="nom" value="<?php echo $nom; ?>">
													<span class="m-form__help">
														Nombre del Profesor
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
													Apellido:
												</label>
												<div class="col-lg-3">
													<input type="text" class="form-control m-input" name="ape" value="<?php echo $ape; ?>">
													<span class="m-form__help">
														Apellido del Profesor
													</span>
												</div>
                                                <label class="col-lg-2 col-form-label">
													Especialidad:
												</label>
												<div class="col-lg-3">
													<input type="text" class="form-control m-input" name="especialidad" value="<?php echo $especialidad; ?>">
													<span class="m-form__help">
														Especialidad del Profesor
													</span>
												</div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
													Correo:
												</label>
												<div class="col-lg-3">
													<input type="email" class="form-control m-input" name="correo" value="<?php echo $correo; ?>">
													<span class="m-form__help">
														Correo del Profesor
													</span>
												</div>

                                                <label class="col-lg-2 col-form-label">
                                                    Tipo de Usuario:
                                                </label>
                                                <div class="col-lg-3">
                                                    <div class="m-radio-inline">
                                                        <label class="m-radio m-radio--solid">
                                                            <input type="radio" name="tipo" <?php if($tipo=='p'){ echo 'checked'; } ?> value="p">
                                                            Profesor
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio m-radio--solid">
                                                            <input type="radio" name="tipo" <?php if($tipo=='a'){ echo 'checked'; } ?> value="a">
                                                            Administrador
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <span class="m-form__help">
                                                        Seleccione el tipo de usuario
                                                    </span>
                                                </div>
                                            </div>
											<div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                    Direccion:
                                                </label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input" name="dir" value="<?php echo $dir; ?>">
														<span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-map-marker"></i>
															</span>
														</span>
													</div>
													<span class="m-form__help">
														Direccion del Profesor
													</span>
												</div>
												<label class="col-lg-2 col-form-label">
													Telefono:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input" name="tel" value="<?php echo $tel; ?>">
													</div>
													<span class="m-form__help">
														Telefono del profesor
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
													Celular:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input" name="cel" value="<?php echo $cel; ?>">
													</div>
													<span class="m-form__help">
														Celular del profesor
													</span>
												</div>
                                                <label class="col-lg-2 col-form-label">
													Fecha de Nacimiento:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input" name="fecha" value="<?php echo $fecha; ?>">
													</div>
													<span class="m-form__help">
														Fecha de nacimiento del profesor
													</span>
												</div>
											</div>
										</div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Estado:
                                            </label>
                                            <div class="col-lg-3">
                                                <div class="m-radio-inline">
                                                    <label class="m-radio m-radio--solid">
                                                        <input type="radio" name="estado" <?php if($estado=='s'){ echo 'checked'; } ?> value="s">
                                                        Activo
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio m-radio--solid">
                                                        <input type="radio" name="estado" <?php if($estado=='n'){ echo 'checked'; } ?> value="n">
                                                        Inactivo
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <span class="m-form__help">
                                                    Seleccione el estado del profesor
                                                </span>
                                            </div>
                                        </div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-10">
														<button type="submit" class="btn btn-success">
															Registrar
														</button>
														<button type="reset" class="btn btn-secondary">
															Cancelar
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
                            </div>
                        </div>
                    </div>

<?php 
    $script = "";
    include_once "../../menu/footer.php"; 
?>