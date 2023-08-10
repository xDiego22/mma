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
	
				<div class="container-fluid my-4 pt-4 shadow bg-white rounded" style="width:95%;">
			
					<div class="container-fluid mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Clubes</div>
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
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>#Codigo</th>
												<th>Nombre</th>
												<th>Telefono</th>
												<th>Deporte Base</th>
												<th>Direccion</th>
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
													<td colspan="7">No hay informacion</td>
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
							<div class="col-md-6">
								<label for="codigo_club">Codigo del Club</label>
								<input class="form-control" maxlength="10" type="text" name="codigo_club" id="codigo_club">
								<span class="texto" id="scodigo_club" style="color: #ff0000;"></span>
							</div>

							<div class="col-md-6">
								<label for="nombre_club">Nombre del Club</label>
								<input class="form-control" maxlength="20" type="text" name="nombre_club" id="nombre_club">
								<span class="texto" id="snombre_club" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="telefono_club">Telefono</label>
								<input class="form-control" maxlength="11" type="text" name="telefono_club" id="telefono_club" placeholder="Ej: &quot;04141234567&quot;">
								<span class="texto" id="stelefono_club" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6"> 
								<label for="deporte_club">Deporte Base</label>
								<select class="form-control" name="deporte_club" id="deporte_club">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Taekwondo</option>
									<option>Karate</option>
									<option>Kapoeira</option>
									<option>Judo</option>
									<option>Boxeo</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="direccion_club">Direccion del Club</label>
								<input class="form-control" maxlength="30" type="text" name="direccion_club" id="direccion_club">
								<span class="texto" id="sdireccion_club" style="color: #ff0000;"></span>
							</div>
						</div>
						
					</div>
				
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="registrar_club" name="registrar_club"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
					<?php 
						}
						if($permisos[2] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="modificar_club" name="modificar_club"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
	<script type="text/javascript" src="js/gestionar_clubes.js"></script>
	
</body>
</html>