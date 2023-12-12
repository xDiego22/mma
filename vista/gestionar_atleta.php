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

				<div class="container-fluid border my-4 pt-4 shadow bg-white rounded" style="width:95%;">
			
					<div class="mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Atletas</div>
							</div>
							<div class="col-auto"> 
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
						
					
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Club</th>
										<th>id_club</th> 
										<th>foto</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Peso</th>
										<th>Estatura</th>
										<th>F. nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Deporte</th>
										<th>Categoria</th>
										<th>F. Ingreso</th>
										<th>Entrenador</th>
										<th>Acciones</th>
									</thead>
								</table>
							</div>
							
						</div>
					</div>
					
					
				</div>

			</div>
		</div>
	</div>


	<!--Modal-->
	<div class="modal fade" id="modal_gestion" tabindex="-1" aria-labelledby="modal_gestionlabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
							<div class="col-md-12">
								<center>
									<label for="archivo" style="cursor:pointer">
										<img src="img/atletas/icono_persona.png" id="imagen" class="img-fluid rounded my-4 centered" style="object-fit:scale-down;width:80px">
											Click aqui para subir foto
									</label>
									<input type="file" id="archivo" name="imagenarchivo" style="display:none" accept=".png,.jpg,.jpeg">
								</center>
							</div>
						</div>

						<div class="row"> 
							<div class="col-md-12 mb-2">
								<label for="club_atleta">Club del Atleta</label>
								<select class=" form-control" name="club_atleta" id="club_atleta">
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
							<div class="col-md-6 mb-2">
								<label for="cedula_atleta">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_atleta" id="cedula_atleta" placeholder="Ej: &quot;15345987&quot;">
								<span class="texto" id="scedula_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="nombres_atleta">Nombre</label>
								<input class="form-control" maxlength="24" type="text" name="nombres_atleta" id="nombres_atleta" placeholder="Ej: &quot;Luis Gustavo&quot;">
								<span class="texto" id="snombres_atleta" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="apellidos_atleta">Apellido</label>
								<input class="form-control" maxlength="25" type="text" name="apellidos_atleta" id="apellidos_atleta" placeholder="Ej: &quot;Perdomo Perez&quot;">
								<span class="texto" id="sapellidos_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="peso_atleta">Peso (Kg)</label>
								<input class="form-control" maxlength="5" type="text" name="peso_atleta" id="peso_atleta" placeholder="Ej: &quot;56.4&quot;">
								<span class="texto" id="speso_atleta" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">							
							<div class="col-md-6 mb-2">
								<label for="estatura_atleta">Estatura (Metros)</label>
								<input class="form-control" maxlength="4" type="text" name="estatura_atleta" id="estatura_atleta" placeholder="Ej: &quot;1.68&quot;">
								<span class="texto" id="sestatura_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="fecha_atleta">Fecha de Nacimiento</label>
								<input class="form-control" type="date" name="fecha_atleta" id="fecha_atleta">
							</div>
						</div> 

						<div class="row">				
							<div class="col-md-6 mb-2">
								<label for="telefono_atleta">Telefono</label>
								<input class="form-control" maxlength="11" type="text" name="telefono_atleta" id="telefono_atleta" placeholder="Ej: &quot;04141234567&quot;">
								<span class="texto" id="stelefono_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="sexo_atleta">Sexo</label>
								<select class="form-control"  name="sexo_atleta" id="sexo_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select> 
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="deporte_atleta">Deporte Base del Atleta</label>
								<select class="form-control" name="deporte_atleta" id="deporte_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Taekwondo">Taekwondo</option>
									<option value="Karate">Karate</option>
									<option value="Kapoeira">Kapoeira</option>
									<option value="Judo">Judo</option>
									<option value="Boxeo">Boxeo</option>
								</select>
							</div>
							<div class="col-md-6 mb-2">
								<label for="categoria_atleta">Categoria del Atleta</label>
								<select class=" form-control" name="categoria_atleta" id="categoria_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Categoria 1">Categoria 1</option>
									<option value="Categoria 2">Categoria 2</option>
									<option value="Categoria 3">Categoria 3</option>
								</select> 
							</div>
						</div>

						<div class="row">			
							<div class="col-md-6 mb-2">
								<label for="fecha_ingreso_atleta">Fecha de Ingreso al Club</label>
								<input class="form-control" type="date" name="fecha_ingreso_atleta" id="fecha_ingreso_atleta">
							</div>
							<div class="col-md-6 mb-2">
								<label for="entrenador_atleta">Entrenador del Atleta</label>
								<input class="form-control" maxlength="25" type="text" name="entrenador_atleta" id="entrenador_atleta">
								<span class="texto" id="sentrenador_atleta" style="color: #ff0000;"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php 
						if($permisos[1] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="registrar_atletas" name="registrar_atletas"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
					<?php 
						}
						if($permisos[2] == "true"){
					?>
					<button type="button" class="btn btn-danger" id="modificar_atletas" name="modificar_atletas"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
	<script type="text/javascript" src="js/jquery.doubleScroll.js"></script>
	<script type="text/javascript" src="js/gestionar_atleta.js"></script>
	
</body>
</html>