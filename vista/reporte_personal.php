<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once('comunes/cabecera.php') ?>
</head>
<body> 
 
	<?php require_once('comunes/modal.php') ?>
	
	<div id="wrapper">

		<?php require_once('comunes/menu-sidebar.php')?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">

				<?php require_once('comunes/menu-topbar.php')?>
				
				<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					<div class="container-fluid text-center h4 text-dark mb-4">
						Reporte de Personal  
					</div>
					<form method="post" action="" id="formulario_reporte_personal" target="_blank">
			
						<div class="row">
							<div class="col-md-12">
								<label for="club_reporte_personal">Club del Atleta</label>
								<select class="selectpicker form-control" name="club_reporte_personal" id="club_reporte_personal" data-live-search="true" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccione un club</option>
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
								<label for="cedula_reporte_personal">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_reporte_personal" id="cedula_reporte_personal" placeholder="Ej: &quot;15345987&quot;">
								
							</div>
							<div class="col-md-6">
								<label for="nombres_reporte_personal">Nombres</label>
								<input class="form-control" maxlength="40" type="text" name="nombres_reporte_personal" id="nombres_reporte_personal" placeholder="Ej: &quot;Diego Alejandro&quot;">
								
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-6">
								<label for="apellidos_reporte_personal">Apellidos</label>
								<input class="form-control" maxlength="50" type="text" name="apellidos_reporte_personal" id="apellidos_reporte_personal" placeholder="Ej: &quot;Aguilar Suarez&quot;">
								
							</div>
			
							<div class="col-md-6">
								<label for="cargo_reporte_personal">Cargo</label>
								<select class="selectpicker form-control" name="cargo_reporte_personal" id="cargo_reporte_personal" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option>Presidente</option>
									<option>Administrador</option>
									<option>Secretaria</option>
									<option>Entrenador</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<hr>
							</div>
						</div>
			
						<div class="row mb-2 justify-content-center">
							<div class="col-md-3">
								<button type="submit" class="btn btn-danger w-100" id="generar_reporte_personal" name="generar_reporte_personal">GENERAR REPORTE</button>
							</div>
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once('comunes/scripts.php')?>
</body>
</html>