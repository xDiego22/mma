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
	
				<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					
					<div class="mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Respaldo de Base de Datos</div>
							</div>
						</div>
					</div>

					<button id='respaldar' name='respaldar' class = 'btn btn-primary'>
						Realizar Backup
					</button>

					<div >
						<select class='form-control' name="restorePoint" id="restorePoint">
							<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
							<option value=""></option>

							<?php
								
								$ruta='backup/';

								if(is_dir($ruta)){

									if($aux=opendir($ruta)){
										while(($archivo = readdir($aux)) !== false){
											if($archivo!="."&&$archivo!=".."){

												$nombrearchivo=str_replace(".sql", "", $archivo);

												$nombrearchivo=str_replace("-", ":", $nombrearchivo);

												$ruta_completa=$ruta.$archivo;
												if(!is_dir($ruta_completa)){
													echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
												}
											}
										}
										closedir($aux);
									}
								}else{
									echo $ruta." No es ruta válida";
								}
							?>
						</select>
					</div>
					
					<button id='restore' name='restore' class = 'btn btn-primary'>
						enviar
					</button>
				</div>
			</div>
			
		</div>
	</div>
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	
<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/respaldo_bd.js"></script>

</body>
</html>