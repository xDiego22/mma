<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once('comunes/cabecera.php') ?>
</head>
<body> 
 
	<?php require_once('comunes/menu.php') ?>
	<?php require_once('comunes/modal.php') ?>
 
	<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:85%;">
		<div class="container-fluid text-center h4 text-dark mb-4">
			Reporte de Historial de Atleta
		</div>
		<form method="post" action="" id="formulario_reporte_atleta" target="_blank">

			<div class="row">
				<div class="col-md-12">
					<label for="atleta_reporte">Atleta</label>
					<select class="selectpicker form-control" name="atleta_reporte" id="atleta_reporte" data-live-search="true" title="Seleccione Opcion">

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
				<div class="col-md-12 text-center mb-3">
					<hr>
				</div>
			</div>

			<div class="row mb-2 justify-content-center">
				<div class="col-md-3">
					<button type="submit" class="btn btn-danger w-100" id="generar_reporte_historial_atleta" name="generar_reporte_historial_atleta">GENERAR REPORTE</button>
				</div>
			</div>
			
		</form>
	</div>
	
	<?php require_once('comunes/scripts.php')?>
</body>
</html>