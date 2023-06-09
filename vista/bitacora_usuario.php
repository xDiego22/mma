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

	<div class="container-fluid pt-3 my-4 shadow-lg bg-white rounded" style="width:90%;">

		<div class="container-fluid mt-4 mb-3">
			<div class="row justify-content-between">
				<div class="col-md-10 mb-2">
					<div class="h4 text-dark">Bitacora de Usuarios</div>
				</div>
				<div class="col-md-2">
                    <button type="button" class="btn btn-success" id="boton_recargar">
                        <i class="bi bi-arrow-repeat mr-1"></i></i>Actualizar
                    </button>
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12" > 
					<div class="table-responsive mb-4" > 
						<table class="table table-hover table-borderless" id="tablaconsulta">
							<thead class="">
								
								<th>Usuario</th>
								<th>Modulo</th>
								<th>Fecha Registro</th>
								<th>Hora Registro</th>
                                <th>Accion Realizada</th>
							</thead>
							<tbody id="resultadoconsulta">
								<?php 
									if(!empty ($listaconsulta)){
										echo $listaconsulta;
									}else{
								?>
									<tr>
										<td colspan="5">No hay informacion</td>
										<td style="display:none"></td>
										<td style="display:none"></th>
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

	<?php //require_once('comunes/pie_pagina.php') ?>
	<script type="text/javascript" src="js/bitacora_usuario.js"></script>
</body>
</html>