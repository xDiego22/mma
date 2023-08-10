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
						Reporte de Eventos
					</div>
					<form method="post" action="" id="formulario_reporte_eventos" target="_blank">
			
						<div class="row">
							<div class="col-md-6">
								<label for="nombre_reporte_evento">Nombre</label>
								<input class="form-control" maxlength="40" type="text" name="nombre_reporte_evento" id="nombre_reporte_evento">
								
							</div>
							<div class="col-md-6">
								<label for="fecha_reporte_evento">Fecha</label>
								<input class="form-control" type="date" name="fecha_reporte_evento" id="fecha_reporte_evento">
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<hr>
							</div>
						</div>
			
						<div class="row mb-2 justify-content-center">
							<div class="col-md-3">
								<button type="submit" class="btn btn-danger w-100" id="generar_reporte_eventos" name="generar_reporte_eventos">GENERAR REPORTE</button>
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