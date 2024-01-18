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
				<div class="container-fluid pt-3 my-4 shadow-lg bg-white rounded" style="width:95%;">
			
					<div class=" mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-md-auto mr-auto mb-2">
								<div class="h4 text-dark">Bitacora de Usuarios</div>
							</div>
							<div class="col-auto">
								<button type='button' id="boton_vaciar" class="btn btn-danger mb-1 ">
									<i class='bi bi-trash3 mr-1'></i>Vaciar
								</button>
							</div>
							<div class="col-auto">
								<button type="button" class="btn btn-success" id="boton_recargar">
									<i class="bi bi-arrow-repeat mr-1"></i>Actualizar
								</button>
							</div>
						</div>
					</div>
					
					<div class="">
						
								<div class="table-responsive mb-4" > 
									<table class="table table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="">
											
											<th>Usuario</th>
											<th>Nombre</th>
											<th>Modulo</th>
											<th>Fecha Registro</th>
											<th>Hora Registro</th>
											<th>Accion Realizada</th>
										</thead>
										
									</table>
								</div>
							
					</div>
					
				</div>
			</div>
		</div>
	</div>


	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/bitacora_usuario.js"></script>
</body>
</html>