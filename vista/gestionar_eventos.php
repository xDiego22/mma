<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
								<div class="h4 text-dark">Gestionar Eventos</div>
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
											<th style="display:none;">id_club</th>
											<th>Nombre</th>
											<th>Fecha</th>
											<th>Hora</th>
											<th>Monto</th>
											<th>Responsable</th>
											<th style="display:none;">Direccion</th>
											<th>Juez 1</th>
											<th>Juez 2</th>
											<th>Juez 3</th>
											<th>Acciones</th>
											
										</thead>
										<tbody id="resultadoconsulta">
											<?php 
												if(!empty ($listaconsulta)){
													echo $listaconsulta;
												}else{
											?>
												<tr>
													<td colspan="9">No hay informacion</td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
													<td style="display:none;"></td>
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
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						
						<div class="row">
							<div class="col-md-6">
								<label for="nombre_evento">Nombre</label>
								<input class="form-control" maxlength="30" type="text" name="nombre_evento" id="nombre_evento">
								<span class="texto" id="snombre_evento" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="fecha_evento">Fecha</label>
								<input class="form-control" type="date" name="fecha_evento" id="fecha_evento">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="hora_evento">Hora</label>
								<input class="form-control" type="time" name="hora_evento" id="hora_evento">
							</div> 
							<div class="col-md-6">
								<label for="club_responsable_evento">Club Responsable</label>
								<select class="form-control" name="club_responsable_evento" id="club_responsable_evento">
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
								<label for="monto_evento">Monto</label>
								<input class="form-control" maxlength="16" type="text" name="monto_evento" id="monto_evento">
								<span class="texto" id="smonto_evento" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="direccion_evento">Direccion</label>
								<input class="form-control" maxlength="30" type="text" name="direccion_evento" id="direccion_evento">
								<span class="texto" id="sdireccion_evento" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label for="juez1">Nombre del Juez 1</label>
								<input type="text" id="juez1" maxlength="50" name="juez1" class="form-control">
								<span class="texto" id="sjuez1" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-4">
								<label for="juez2">Nombre del Juez 2</label>
								<input type="text" id="juez2" maxlength="50" name="juez2" class="form-control">
								<span class="texto" id="sjuez2" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-4">
								<label for="juez3">Nombre del Juez 3</label>
								<input type="text" id="juez3" maxlength="50" name="juez3" class="form-control">
								<span class="texto" id="sjuez3" style="color: #ff0000;"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="registrar_evento" name="registrar_evento"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
					<?php 
						}
						if($permisos[2] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="modificar_evento" name="modificar_evento"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
	<script type="text/javascript" src="js/gestionar_eventos.js"></script>
	
</body>
</html>