<!DOCTYPE html>
<html lang="es">
<head>  
	<?php  require_once('comunes/cabecera.php');?> 
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body> 
	<?php require_once('comunes/modal.php') ?>
	<!--Div oculta para colocar el mensaje a mostrar-->
	<div id="mensajes" style="display:none">
		<?php
			if(!empty($mensaje)){
				echo $mensaje;
			}
		?>	
	</div>
 	
 	<div class="contenedor">
 		<div class="form">
			<h1 class="form_title">Bienvenido</h1>

			<div class="form_container">

				<div class="form_group">
					<input type="text" maxlength="8" class="form_input" id="cedula_inicio" name="cedula_inicio" placeholder=" ">
					<label for="cedula_inicio" class="form_label">Cedula</label>
					<span class="form_line"></span>
				</div>

				<div class="form_group">
					<input type="password" maxlength="15" class="form_input" id="contrasena_inicio" name="contrasena_inicio" placeholder=" ">
					<label for="contrasena_inicio" class="form_label">Contraseña</label>
					<span class="form_line"></span>
				</div>

				<button type="button" class="form_submit" id="iniciar_sesion" name="iniciar_sesion">Ingresar</button>

				<a href="?pagina=recuperar_contrasena" class="form_link">¿Olvidaste tu contraseña?</a>
			</div>
		</div>
 	</div>
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/inicio_sesion.js"></script>
	
</body>
</html>