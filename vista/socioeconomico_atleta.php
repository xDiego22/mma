<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once('comunes/cabecera.php');?>
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

				<div class="container border my-4 shadow bg-white rounded" style="width:95%;">
			
					<div class="container mt-4 mb-3">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Informacion Socioeconomica de Atletas</div>
							</div>
							<div class="col-auto">
								<?php 
									if($permisos[1] == "true"){
								?>
								<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo" onclick="modalregistrar()">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
								</button>
								<?php 
									}
								?>
							</div>
						</div>
					</div>
						
					<div class="container">
						<div class="row">
							<div class="col-md-12" >
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<th style="display:none;">id_atleta</th>
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Tipo de vivienda</th>
											<th>Zona de vivienda</th>
											<th>Cant. habitantes del hogar</th>
											<th>Propiedad de la vivienda</th>
											<th>Internet</th>
											<th>Luz</th>
											<th>Agua</th>
											<th>Tlf. residencial</th>
											<th>Cable</th>
											<th>Acciones</th>
										</thead>
										<tbody id="resultadoconsulta">
											<?php 
												if(!empty ($listaconsulta)){
													echo $listaconsulta;
												}else{
											?>
												<tr>
													<td colspan="12">No hay informacion</td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
												</tr>
												
											<?php 
												}
											?>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>


	<!--Modal-->
	<div class="modal fade" id="modal_gestion" tabindex="-1" aria-labelledby="modal_gestionlabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header text-light bg-dark">
					<h5 class="modal-title" id="modal_gestionlabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row"> 
							<div class="col-md-12 mb-2">
									<label for="nombre_atleta">Atleta</label>
									<select class=" form-control" name="nombre_atleta" id="nombre_atleta">
										<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
										<option value=""></option>
										<?php
											if(!empty($consulta_atletas)){
												echo $consulta_atletas;
											}
										?>
									</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="tipo_vivienda">Tipo de vivienda</label>
								<select class="form-control" name="tipo_vivienda" id="tipo_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Departamento">Departamento</option>
									<option value="Casa">Casa</option>
									<option value="Apartamento">Apartamento</option>
								</select> 
							</div>
							<div class="col-md-6 mb-2">
								<label for="zona_vivienda">Zona de vivienda</label>
								<select class="form-control" name="zona_vivienda" id="zona_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Rural">Rural</option>
									<option value="Urbana">Urbana</option>
								</select> 
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="habitantes_vivienda">Cantidad de habitantes del hogar</label>
								<input type="number" class="form-control" name="habitantes_vivienda" id="habitantes_vivienda" min="0" max="20" placeholder="Ej: 1, 2, 3...">
								<span class="texto" id="shabitantes_vivienda" style="color: #ff0000;"></span>
							</div> 
							<div class="col-md-6 mb-2">
								<label for="propiedad_vivienda">Propiedad de la vivienda</label>
								<select class="form-control" name="propiedad_vivienda" id="propiedad_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Alquilada">Alquilada</option>
									<option value="Propia">Propia</option>
									<option value="Otro">Otro</option>
								</select> 
							</div> 
						</div>

						
						<div class="h5 text-dark text-center my-2">
							Servicios Basicos
						</div>
						
							
						<div class="row container">
							
							<div class="col-6">
							
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="internet" name="internet" value="POSEE">
									<label class="form-check-label" for="internet">Internet</label>
								</div>
							

								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="luz" name="luz" value="POSEE">
									<label class="form-check-label" for="luz">Luz</label>
								</div>

							</div>

							<div class="col-6">
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="agua" name="agua" value="POSEE">
									<label class="form-check-label" for="agua">Agua</label>
								</div>

								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="telefono_residencial" name="telefono_residencial" value="POSEE">
									<label class="form-check-label" for="telefono_residencial">Tlf. residencial</label>
								</div>
							</div>

							<div class="col-6">
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="cable" name="cable" value="POSEE">
									<label class="form-check-label" for="cable">Cable de TV</label>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="registrar" name="registrar_usuarios"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
					<?php 
						}
						if($permisos[2] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="modificar" name="modificar_usuarios"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
					<?php 
						}
					?>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
							
				</div>
			</div>
		</div>
	</div>
	<!--Fin Modal-->
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/socioeconomico_atleta.js"></script>
</body>
</html>