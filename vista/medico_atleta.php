<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        require_once('comunes/cabecera.php');
    ?>
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

				<div class="container-fluid border my-4 shadow bg-white rounded" style="width:95%;">
			
					<div class="mt-4 mb-3">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Informacion Medica de Atletas</div>
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
						
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th style="display:none;">id_atleta</th>
										<th>Cedula</th>
										<th>Nombre atleta</th>
										<th>Medicamento que consume</th>
										<th>Enfermedad que padece</th>
										<th>Discapacidad que posee</th>
										<th>Dieta alimenticia</th>
										<th>Enfermedades pasadas</th>
										<th>Nombre de emergencia</th>
										<th>Tlf. de emergencia</th>
										<th>Tipo de relacion</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
										<?php 
											if(!empty ($listaconsulta)){
												echo $listaconsulta;
											}else{
										?>
											<tr>
												<td style="display:none"></td>
												<td style="display:none"></td>
												<td style="display:none"></td>
												<td style="display:none"></td>
												<td style="display:none"></td>
												<td colspan="11">No hay informacion</td>
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
							<label for="medicamento_atleta">Medicamento que consume</label>
							<input class="form-control" maxlength="50" type="text" id="medicamento_atleta" name="medicamento_atleta" placeholder="Ej: &quot;Ninguno, Diclofenaco...&quot;">
							<span class="texto" id="smedicamento_atleta" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="enfermedad_atleta">Enfermedad que padezca actualmente</label>
							<input class="form-control" maxlength="50" type="text" id="enfermedad_atleta" name="enfermedad_atleta" placeholder="Ej: &quot;Ninguno, Artritis&quot;">
							<span class="texto" id="senfermedad_atleta" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="discapacidad_atleta">Discapacidad que posee</label>
							<input class="form-control" maxlength="50" type="text" id="discapacidad_atleta" name="discapacidad_atleta" placeholder="Ej:  &quot;Ninguno...&quot;">
							<span class="texto" id="sdiscapacidad_atleta" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="dieta_atleta">Dieta alimenticia</label>
							<input class="form-control" maxlength="50" type="text" id="dieta_atleta" name="dieta_atleta" placeholder="Ej:  &quot;Ninguno, Proteina Pura...&quot;">
							<span class="texto" id="sdieta_atleta" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="enfermedades_pasadas">Enfermedades Pasadas</label>
							<input class="form-control" maxlength="50" type="text" id="enfermedades_pasadas" name="enfermedades_pasadas" placeholder="Cirugias, Huesos rotos, Electrocardiogramas, Etc...">
							<span class="texto" id="senfermedades_pasadas" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="nombre_parentesco">Nombre de contacto en caso de emergencia</label>
							<input class="form-control" maxlength="50" type="text" id="nombre_parentesco" name="nombre_parentesco" placeholder="Ramon Ramos">
							<span class="texto" id="snombre_parentesco" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="telefono_parentesco">Telefono de contacto en caso de emergencia</label>
							<input class="form-control" maxlength="11"  type="text" id="telefono_parentesco" name="telefono_parentesco" placeholder="Ej: &quot;04145746754&quot;">
							<span class="texto" id="stelefono_parentesco" style="color: #ff0000;"></span>
						</div>
						<div class="col-md-6 mb-2">
							<label for="relacion_parentesco">Tipo de relacion de contacto que tiene con el atleta</label>
							<input class="form-control" maxlength="20" type="text" id="relacion_parentesco" name="relacion_parentesco" placeholder="Ej: Padre, Madre, Amigo, Etc...">
							<span class="texto" id="srelacion_parentesco" style="color: #ff0000;"></span>
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
	<!--Fin Modal regitro-->

	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/medico_atleta.js"></script>
	
</body>
</html>