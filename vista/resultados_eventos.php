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
				<div class="container-fluid  my-4 pt-4 shadow bg-white rounded" style="width:95%;">
			
					<div class="container-fluid-fluid mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Resultado de Eventos</div>
							</div>
							<div class="col-auto" >
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
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta"  width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>Nombre del Evento</th>
												<th style="display:none">id_evento</th>
												<th>Atleta Ganador</th>
												<th>Atleta Perdedor</th>
												<th>Ronda</th>
												<th>Forma de Ganar</th>
												<th style="display:none">atleta1</th>
												<th style="display:none">atleta2</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody id="resultadoconsulta">
											<?php 
												if(!empty ($listaconsulta)){
													echo $listaconsulta;
												}else{
											?>
												<tr>
													<td colspan="8">No hay informacion</td>
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
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
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
							<div class="col-md-12">
								<label for="nombre_evento">Evento</label>
								<select class="form-control" name="nombre_evento" id="nombre_evento">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<?php
										if(!empty($consulta_eventos)){
											echo $consulta_eventos;
										}
									?>
								</select>
							</div>

						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="">Ronda</label>
								<select class="form-control" name="ronda" id="ronda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
								</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<label for="atleta_ganador">Atleta Ganador</label>
								<select class="form-control" name="atleta_ganador" id="atleta_ganador" name="atleta_ganador" >
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="atleta_perdedor">Atleta Perdedor</label>
								<select class="form-control" name="atleta_perdedor" id="atleta_perdedor">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
								</select>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="forma_ganar">Forma de Ganar</label>
								<select class="form-control" name="forma_ganar" id="forma_ganar">
								<option value="" hidden="" selected="hidden">Seleccionar opcion</option>
								<option value="sumusion">Sumision</option>
								<option value="decision">Decision</option>
								<option value="rcb">RCB</option>
								<option value="knockout">Knockout</option>
								<option value="forfeit">Forfeit</option>
								</select>
							</div>
						</div>

					</div>
				
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="incluir_resultados" name="registrar_resultados"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
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
	<script type="text/javascript" src="js/resultados_eventos.js"></script>
	
</body>
</html> 