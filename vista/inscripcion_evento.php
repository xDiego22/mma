<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="utf-8">
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
					<form method="post" action="" enctype="multipart/form-data">
						<div class="container-fluid text-center h4 text-dark my-3">
							Gestionar Inscripcion a Eventos
						</div>
						<hr>
						<?php 
							if($permisos[1] == "true"){
						?>
							<div class="container-fluid h5 mb-4">
								Registro de participantes en eventos
							</div>
						<?php 
							}
						?>
						
						<div class="row">
							<div class="col-md-12">
								<label for="evento_inscripcion">Evento</label>
								<select class="selectpicker form-control" name="evento_inscripcion" id="evento_inscripcion" data-live-search="true" title="Seleccionar Evento">
									<option value=""></option>
									<?php
										if(!empty($consulta_eventos)){
											echo $consulta_eventos;
										} 
									?>		
								</select>
							</div>
						</div>
						
						<?php 
							if($permisos[1] == "true"){
						?>
			
							<div class="row">
								<div class="col-md-4">
									
									<center>
										<label for="archivo" style="cursor:pointer">
										<img src="img/atletas/icono_persona.png" id="imagen" class="img-fluid rounded mt-3 centered" style="object-fit:scale-down;width:50px">
										<br>Click para subir foto
										</label>
										<input type="file" id="archivo" name="imagenarchivo" style="display:none" accept=".png,.jpg,.jpeg">
									</center>
								
								</div>
								<div class="col-md-4">
									<label for="cedula_inscripcion">Cedula</label>
									<input type="text" maxlength="8" class="form-control" id="cedula_inscripcion" name="cedula_inscripcion" placeholder="Ej: &quot;15345987&quot;">
									<span id="scedula_inscripcion" style="color: #ff0000;"></span>
								</div>
								<div class="col-md-4">
									<label for="nombre_inscripcion">Nombre</label>
									<input type="text" maxlength="20" class="form-control" id="nombre_inscripcion" name="nombre_inscripcion" placeholder="Ej: &quot;Luis Perdomo&quot;">
									<span id="snombre_inscripcion" style="color: #ff0000;"></span>
								</div>
								
							</div>
			
							<div class="row">
								<div class="col-md-6">
									<label for="sexo_inscripcion">Sexo</label>
									<select name="sexo_inscripcion" id="sexo_inscripcion" class="form-control">
										<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
									
								</div>
								<div class="col-md-6">
									<label for="peso_inscripcion">Peso</label>
									<input type="text" maxlength="5" class="form-control" id="peso_inscripcion" name="peso_inscripcion">
									<span id="speso_inscripcion" style="color: #ff0000;"></span>
								</div>
			
								
							</div>
			
							<div class="row">
								<div class="col-md-6">
									<label for="fechadenacimiento">F. Nacimiento</label>
									<input type="date" class="form-control" id="fechadenacimiento" name="fechadenacimiento">
								</div>
								<div class="col-md-6">
									<label for="estado">Estado</label>
									<select name="estado" id="estado" class="form-control" data-live-search="true">
										<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
										<option value=""></option>
										<option value="Amazonas">Amazonas</option>
										<option value="Anzoategui">Anzoategui</option>
										<option value="Apure">Apure</option>
										<option value="Aragua">Aragua</option>
										<option value="Barinas">Barinas</option>
										<option value="Bolivar">Bolivar</option>
										<option value="Carabobo">Carabobo</option>
										<option value="Caracas">Caracas</option>
										<option value="Cojedes">Cojedes</option>
										<option value="Delta Amacuro">Delta Amacuro</option>
										<option value="Falcon">Falcon</option>
										<option value="Guarico">Guarico</option>
										<option value="Lara">Lara</option>
										<option value="Merida">Merida</option>
										<option value="Miranda">Miranda</option>
										<option value="Monagas">Monagas</option>
										<option value="Nueva Esparta">Nueva Esparta</option>
										<option value="Portuguesa">Portuguesa</option>
										<option value="Sucre">Sucre</option>
										<option value="Tachira">Tachira</option>
										<option value="Trujillo">Trujillo</option>
										<option value="Vargas">Vargas</option>
										<option value="Yaracuy">Yaracuy</option>
										<option value="Zulia">Zulia</option>
									</select>
								</div>
							</div>
							
							<div class="row my-3 justify-content-center">
								<div class="col-md-3 my-3">
									<button type="button" class="btn btn-danger w-100" id="incluir_evento" name="incluir_evento"><i class="bi bi-plus-lg mr-1"></i>Registrar</button>
								</div>
							</div>
							
						<?php 
							}else{//para darle un espacio al titulo de abajo por si no tiene el permiso registrar
						?>
							<div class="mb-2 invisible">
								<hr>
							</div>
						<?php 
							}
						?>
						<div class="row"> 
							<div class="col-md-12 text-center mb-3 h5">
								Atletas inscritos en el evento 
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12  mb-7">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>Foto</th>
												<th>Cedula</th>
												<th>Nombre</th>
												<th>Sexo</th>
												<th>Edad</th>
												<th>Peso</th>
												<th>Estado</th>
												<th>Accion</th>
												<th style="display:none;">id_evento</th>
												
											</tr>
										</thead>
										<tbody id="lista_inscritos">
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
	</div>
	

	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/inscripcion_evento.js"></script>
	
	
</body>
</html>