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
			<h4 class="">Recuperar Contraseña</h4>

			<div class="form_container">

				<div class="form_group">
					<input type="email" class="form_input" id="correo_recuperar" name="correo_recuperar" placeholder=" ">
					<label for="correo_recuperar" class="form_label">Correo</label>
					<span class="form_line"></span>
				</div>

				<button type="button" class="form_submit" id="enviar_correo" name="enviar_correo">Enviar</button>

                <a href="?pagina=inicio_sesion" class="form_link">Iniciar sesion</a>
			</div>
		</div>
 	</div>
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/recuperar_contrasena.js"></script>
	
</body>
</html>