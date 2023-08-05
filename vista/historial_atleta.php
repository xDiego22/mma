<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once('comunes/cabecera.php') ?>
</head>
<body>

	<!--Div oculta para colocar el mensaje a mostrar-->
	<div id="mensajes" style="display:none">
		<?php
			if(!empty($mensaje)){
				echo $mensaje;
			}
		?>	
	</div>

	<?php require_once('comunes/menu.php') ?>
	<?php require_once('comunes/modal.php') ?>

	<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:85%;">
		<div class="container-fluid text-center h4 text-dark my-3">
			Historial de Atleta
		</div>

		<div class="row">
			<div class="col-md-12">
				<label for="atleta">Atleta</label>
				<select class="selectpicker form-control" name="atleta" id="atleta" name="atleta" title="Seleccione Opcion">
					<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
					<?php
						if(!empty($consulta_atletas)){
							echo $consulta_atletas;
						}
					?> 
				</select>
			</div>
			
		</div>
		

		<div class="row">
			<div class="col-md-12 mb-3">
				<br>
			</div>
		</div>

		<div class="container-fluid">
				<div class="row">
					<div class="col-md-12  mb-7" style="height: 400px;overflow: auto;">
						<table class="table table-striped table-hover">
							<thead>
								<tr> 
									<th>Evento en que participo</th>
									<th>Resultado/Ronda</th>

								</tr>
							</thead>
							<tbody id="lista_resultado">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		
	
	</div>
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/historial_atleta.js"></script>
	
</body>
</html> 