<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once('comunes/cabecera.php') ?>
</head>
<body id="page-top"> 

	<!--Div oculta para colocar el mensaje a mostrar-->
	<div id="mensajes" style="display:none">
		<?php
			if(!empty($mensaje)){
				echo $mensaje;
			}
		?>	
	</div>

	<?php require_once('comunes/modal.php') ?>

	<div id="wrapper">

		<?php require_once('comunes/menu-sidebar.php')?>
		
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				
				<?php require_once('comunes/menu-topbar.php')?>
	
				<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					
					<div class="mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Respaldo de Base de Datos</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-center align-items-center">

						<div class="col-md-auto mb-2 text-center">

							<button id='respaldar' name='respaldar' class='btn btn-outline-success'>
								<img src="img/iconos/backup.png" class="img-fluid" alt="backup image">
								<p class="mt-2 font-size-xl">Realizar Copia de Seguridad</p>
							</button>

						</div>
						<div class="col-md-auto mb-2 text-center">

							<button id="boton_restorePoint" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal_restorePoint">
								
								<img src="img/iconos/restore.png" class="img-fluid" alt="restore image">
								<p class="mt-2 font-size-xl">Restaurar Copia de Seguridad</p>
							</button>

						</div>
					</div>

				</div>
			</div>
			
		</div>
	</div>

	<!--Modal-->
	<div class="modal fade" id="modal_restorePoint" tabindex="-1" aria-labelledby="modal_restorePointlabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_restorePointlabel">Punto de Restauración</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="container-fluid">
						<div class="row justify-content-center">
							<div class="col-md-10">
								<label for="restorePoint">Seleccionar punto de restauracion</label>
								<div class="d-flex">
									<select class='form-control' name="restorePoint" id="restorePoint">
										<option value="" hidden="" selected="hidden">--Seleccionar Opcion--</option>
										<option value=""></option>

										<?php
											$ruta='backup/';

											$opciones = array();

											if(is_dir($ruta)){

												if($aux=opendir($ruta)){
													while(($archivo = readdir($aux)) !== false){
														if($archivo!="."&&$archivo!=".."){

															$nombrearchivo=str_replace(".sql", "", $archivo);

															$nombrearchivo=str_replace("-", ":", $nombrearchivo);

															$ruta_completa=$ruta.$archivo;

															if(!is_dir($ruta_completa)){
																 $opciones[$nombrearchivo] = '<option value="'.$archivo.'">'.$nombrearchivo.'</option>';
															}
														}
													}
													closedir($aux);

													// Ordena el array en orden descendente
													krsort($opciones);

													foreach ($opciones as $opcion) {
														echo $opcion;
													}
												}
											}else{
												echo $ruta." No es ruta válida";
											}
										?>
									</select>
									<button type='button' id="boton_eliminar" class="btn btn-danger mb-1 ml-2">
										<i class='bi bi-trash-fill'></i>
									</button>
								</div>
							</div>
						</div>
						
						<div class="row justify-content-center mt-3">
							
							<button id='restore' name='restore' class='btn btn-primary'>
								Restaurar
							</button>
							
						</div>
					</div>



				</div>
				<div class="modal-footer">
					
					<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
							
				</div>
			</div>
		</div>
	</div>
	<!--Fin Modal regitro-->
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	
<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/respaldo_bd.js"></script>

</body>
</html>