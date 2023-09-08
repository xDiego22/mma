<!DOCTYPE html>
<html lang="es">
<head>
	<?php  require_once('comunes/cabecera.php');?>
</head>
<body id="page-top">

	<div id="wrapper">	
		<?php require_once('comunes/menu-sidebar.php')?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<?php require_once('comunes/menu-topbar.php')?>
	
				<div class="container-fluid my-4 py-4 shadow bg-white rounded" style="width:95%;">
                    <div class="mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Perfil de Usuario</div>
							</div>
							<div class="col-auto" >

								<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_contrasena" id="boton_contrasena" >
									<i class="bi bi-key-fill"></i>
								</button>
								
								<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal_perfil" id="boton_editar" >
									<i class="bi bi-pencil-fill mr-1"></i>Editar perfil
								</button>
								
							</div>
						</div>
                        <hr>
					</div>

                    <div class="mt-4">
                       
                        <div class='h2 text-center mb-4'><span>Diego Aguilar</span></div>
                       
                        <div class="row mb-3">
                            <div class="col-md-12">
                                Cedula: <span>29831184</span>
                            </div>
                            
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12 text-wrap text-truncate">
                                Correo Electronico: <span>diegoaguilar221202@gmail.com</span>
                            </div>
                        </div>
                         
                    </div>
                </div>
			</div>
		</div>
	</div>

    <!--Modal perfil-->
	<div class="modal fade" id="modal_perfil" tabindex="-1" aria-labelledby="modal_perfilLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_perfilLabel">Editar Perfil</h5>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-12">
								<label for="nombre_perfil">Nombre</label>
								<input type="text" maxlength="30" class='form-control' id='nombre_perfil' name='nombre_perfil'>
								<span class="texto" id="snombre" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="correo_perfil">Correo</label>
								<input type="email" class="form-control" id="correo_perfil" name="correo_perfil" maxlength="50">
								<span class="texto" id="scorreo" style="color: #ff0000;"></span>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					
					<button type="button" class="btn btn-primary" id="editar" name="editar"><i class="bi bi-pencil-fill mr-1"></i>Editar</button>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
							
				</div>
			</div>
		</div>
	</div>
	<!--Fin Modal-->

	 <!--Modal contrasena-->
	<div class="modal fade" id="modal_contrasena" tabindex="-1" aria-labelledby="modal_contrasenaLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_contrasenaLabel">cambiar contraseña</h5>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="contrasena_actual">Contraseña actual</label>
								<input class="form-control" maxlength="8" type="text" name="contrasena_actual" id="contrasena_actual">
								<span class="texto" id="scontrasena_actual" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="contrasena_nueva">Contraseña Nueva</label>
								<input class="form-control" maxlength="8" type="text" name="contrasena_nueva" id="contrasena_nueva">
								<span class="texto" id="scontrasena_nueva" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="contraseña_repetir">Repetir Contraseña</label>
								<input class="form-control" maxlength="8" type="text" name="contraseña_repetir" id="contraseña_repetir">
								<span class="texto" id="scontrasena_repetir" style="color: #ff0000;"></span>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					
					<button type="button" class="btn btn-success" id="cambiar" name="cambiar"><i class="bi bi-pencil-fill mr-1"></i>cambiar</button>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
							
				</div>
			</div>
		</div>
	</div>
	<!--Fin Modal-->

	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	<?php require_once('comunes/scripts.php')?>
</body>
</html>