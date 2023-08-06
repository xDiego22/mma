<!DOCTYPE html>
<html>
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
			
					<div class="container-fluid mt-4 mb-3">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Personal</div>
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
						
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12" >
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>Club</th>
												<th style="display:none">id_club</th>
												<th>Cedula</th>
												<th>Nombre</th>
												<th>Telefono</th>
												<th>Cargo</th>
												<th>Direccion</th>
												<th>Acciones</th>
												<th style="display:none">nombre</th>
												<th style="display:none">apellido</th>
											</tr>
										</thead>
										<tbody id="resultadoconsulta">
											<?php 
												if(!empty ($listaconsulta)){
													echo $listaconsulta;
												}else{
											?>
												<tr>											
													<td colspan="10">No hay informacion</td>
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
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
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
								<label for="club_personal">Seleccionar el Club</label>
								<select class="form-control" name="club_personal" id="club_personal">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<?php
										if(!empty($consulta_clubes)){
											echo $consulta_clubes;
										}
									?>
								</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<label for="cedula_personal">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_personal" id="cedula_personal" placeholder="Ej: &quot;15345987&quot;">
								<span id="scedula_personal" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="nombres_personal">Nombres</label>
								<input class="form-control" maxlength="30" type="text" name="nombres_personal" id="nombres_personal" placeholder="Ej: &quot;Diego Alejandro&quot;">
								<span id="snombres_personal" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="apellidos_personal">Apellidos</label>
								<input class="form-control" maxlength="30" type="text" name="apellidos_personal" id="apellidos_personal" placeholder="Ej: &quot;Aguilar Suarez&quot;">
								<span id="sapellidos_personal" style="color: #ff0000;"></span>
							</div> 
							<div class="col-md-6">
								<label for="telefono_personal">Telefono</label>
								<input class="form-control" maxlength="11" type="text" name="telefono_personal" id="telefono_personal" placeholder="Ej: &quot;04141234567&quot;">
								<span id="stelefono_personal" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="cargo_personal">Cargo</label>
								<select class=" form-control" name="cargo_personal" id="cargo_personal">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Presidente</option>
									<option>Administrador</option>
									<option>Secretaria</option>
									<option>Entrenador</option>
								</select>
							</div>

							<div class="col-md-6">
								<label for="direccion_personal">Direccion</label>
								<input class="form-control" maxlength="30" type="text" name="direccion_personal" id="direccion_personal">
								<span id="sdireccion_personal" style="color: #ff0000;"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="registrar_personal" name="registrar_personal"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
					<?php 
						}
						if($permisos[2] == "true"){
					?>
				
					<button type="button" class="btn btn-danger" id="modificar_personal" name="modificar_personal"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
	<script type="text/javascript" src="js/gestionar_personal.js"></script>
	
</body>
</html>
