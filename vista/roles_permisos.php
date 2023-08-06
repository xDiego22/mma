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
				
				<div class="container-fluid border my-4 shadow bg-white rounded" style="width:95%;">
			
					<div class="container-fluid mt-4">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Roles y Permisos</div>
							</div>
							<div class="col-auto mb-2">
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
						
					<div class="container-fluid mb-5">
						<div class="row">
							<div class="col-md-12" >
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>#</th> 
												<th>Nombre</th>
												<th>Descripcion</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody id="resultadoconsulta">
											<?php 
												if(!empty ($listaconsulta)){
													echo $listaconsulta;
												}else{
											?>
												<tr>
													<td colspan="4">No hay informacion</td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
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
						<i class="bi bi-x"></i><span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="nombre_rol">Nombre de Rol</label>
								<input class="form-control" maxlength="30" type="text" name="nombre_rol" id="nombre_rol" placeholder="Ej: &quot;Administrador, Invitado...&quot;">
								<span id="snombre_rol" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="descripcion_rol">Descripcion de Rol</label>
								<input class="form-control" maxlength="50" type="text" name="descripcion_rol" id="descripcion_rol">
								<span id="sdescripcion_rol" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-12">
								<div class="table-responsive card">
									<table class="table table-hover ">
										<thead class="thead-dark">
											<th>Modulo</th>
											<th class="text-center">Acceso</th>
										</thead>
										<tbody>
											<tr>
												<td>Gestionar Clubes</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_club" name="modulo_club">
												</td>
											</tr>
											<tr>
												<td>Gestionar Personal</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_personal" name="modulo_personal">
												</td>
											</tr>
											<tr>
												<td>Gestionar Atletas</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_atletas" name="modulo_atletas">
												</td>
											</tr>
											<tr>
												<td>Gestionar Datos Medicos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_medicos" name="modulo_medicos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Datos Socioeconomicos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_socioeconomicos" name="modulo_socioeconomicos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Eventos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_eventos" name="modulo_eventos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Usuarios</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_usuarios" name="modulo_usuarios">
												</td>
											</tr>
											<tr>
												<td>Bitacora de Usuarios</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_bitacora" name="modulo_bitacora">
												</td>
											</tr>
											<tr>
												<td>Roles y Permisos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_roles" name="modulo_roles">
												</td>
											</tr>
											<tr>
												<td>Inscripcion a Evento</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_inscripcion" name="modulo_inscripcion">
												</td>
											</tr>
											<tr>
												<td>Emparejamientos y Combates</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_emparejamientos" name="modulo_emparejamientos">
												</td>
											</tr>
											<tr>
												<td>Resultado de Eventos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_resultados" name="modulo_resultados">
												</td>
											</tr>
											<tr>
												<td>Historial del Atleta</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_historial" name="modulo_historial">
												</td>
											</tr>

											<tr>
												<td>Reportes</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_reportes" name="modulo_reportes">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="registrar" name="registrar"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
					<?php 
						}
					?>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
							
				</div>
			</div>
		</div>
	</div>
	<!--Fin Modal regitro-->

	<!--Modal modificar-->
	<div class="modal fade" id="modal_modificar" tabindex="-1" aria-labelledby="modal_modificarlabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header text-light bg-dark">
					<h5 class="modal-title" id="modal_modificarlabel">Modificar Rol</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="bi bi-x"></i><span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="nombre_rol2">Nombre de Rol</label>
								<input class="form-control" disabled type="text" name="nombre_rol2" id="nombre_rol2" placeholder="Ej: &quot;Administrador, Invitado...&quot;">
								<span id="snombre_rol2" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="descripcion_rol2">Descripcion de Rol</label>
								<input class="form-control" type="text" name="descripcion_rol2" id="descripcion_rol2">
								<span id="sdescripcion_rol2" style="color: #ff0000;"></span>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					
					<?php 
						
						if($permisos[2] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="modificar" name="modificar"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
					<?php 
						}
					?>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
							
				</div>
			</div>
		</div>
	</div>
	<!--Fin Modal modificar-->

	<!--Modal permisos-->
	<div class="modal fade" id="modal_permisos" tabindex="-1" aria-labelledby="modal_permisoslabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg">
			<div class="modal-content">
				<div class="modal-header text-light bg-dark">
					<h5 class="modal-title" id="modal_permisoslabel">Permisos de rol:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive card">
								<form id="formulario_permisos">
									<input type="text" name="accion" id="accion2" value="Modificar" style="display:none;" />
									<input type="text" id="accion" name="accion" value="actualizar_permiso" style="display:none;">
									<input type="text" id="rol_modulo2" name="rol_modulo2" style="display:none;">
									
									<table class="table table-hover " id="tabla_permisos">
											<thead>
												<th>#</th>
												<th>Modulo</th>
												<th class='text-center'>Consultar</th>
												<th class='text-center'>Registrar</th>
												<th class='text-center'>Modificar</th>
												<th class='text-center'>Eliminar</th>
											</thead>
											<tbody id="consulta_permisos">
												
											</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">	
					<button type="button" class="btn btn-success" id="actualizar" name="actualizar"><i class="bi bi-check-circle mr-1"></i>Actualizar</button>			
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
	<script type="text/javascript" src="js/roles_permisos.js"></script>
</body>
</html>