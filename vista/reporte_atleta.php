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
						Reporte de Atletas
					</div>
					<form method="post" action="" id="formulario_reporte_atleta" target="_blank">
						<div class="row">
							<div class="col-md-6">
								<label for="club_reporte_atleta">Club del Atleta</label>
								<select class="selectpicker form-control" name="club_reporte_atleta" id="club_reporte_atleta" data-live-search="true" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccione un club</option>
									<option value=""></option>
									<?php
										if(!empty($consulta_clubes)){
											echo $consulta_clubes;
										}
									?>
								</select>
							</div>
			
							<div class="col-md-6">
								<label for="cedula_reporte_atleta">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_reporte_atleta" id="cedula_reporte_atleta" placeholder="Ej: &quot;15345987&quot;">
								
							</div>
						</div>
						
				 
						<div class="row">
							
							<div class="col-md-6">
								<label for="nombres_reporte_atleta">Nombre</label>
								<input class="form-control" maxlength="24" type="text" name="nombres_reporte_atleta" id="nombres_reporte_atleta" placeholder="Ej: &quot;Luis Gustavo&quot;">
								
							</div>
			
							<div class="col-md-6">
								<label for="apellidos_reporte_atleta">Apellido</label>
								<input class="form-control" maxlength="25" type="text" name="apellidos_reporte_atleta" id="apellidos_reporte_atleta" placeholder="Ej: &quot;Perdomo Perez&quot;">
							</div>
						</div>
			 
						<div class="row">
							
							<div class="col-md-6">
								<label for="fecha_reporte_atleta">Fecha de Nacimiento</label>
								<input class="form-control" type="date" name="fecha_reporte_atleta" id="fecha_reporte_atleta">
							</div>
			
							<div class="col-md-6">
								<label for="sexo_reporte_atleta">Sexo</label>
								<select class=" selectpicker form-control" name="sexo_reporte_atleta" id="sexo_reporte_atleta" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Masculino</option>
									<option>Femenino</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							
							<div class="col-md-6">
								<label for="deporte_reporte_atleta">Deporte Base del Atleta</label>
								<select class="selectpicker form-control" name="deporte_reporte_atleta" id="deporte_reporte_atleta" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Taekwondo</option>
									<option>Karate</option>
									<option>Kapoeira</option>
									<option>Judo</option>
									<option>Boxeo</option>
								</select>
							</div>
			
							<div class="col-md-6">
								<label for="categoria_reporte_atleta">Categoria del Atleta</label>
								<select class="selectpicker form-control" name="categoria_reporte_atleta" id="categoria_reporte_atleta" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Categoria 1</option>
									<option>Categoria 2</option>
									<option>Categoria 3</option>
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
								<button type="submit" class="btn btn-danger w-100" id="generar_reporte_eventos" name="generar_reporte_atleta">GENERAR REPORTE</button>
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