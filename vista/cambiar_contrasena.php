<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once('comunes/cabecera.php') ?>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body> 

	<?php require_once('comunes/modal.php') ?>

	<div class="contenedor">

        <div class="form">
            <h4 >Restaurar Contraseña</h4>
            <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <label for="contrasena">Nueva contraseña</label>
                    <input class="form-control" type="password" name="contrasena" id="contrasena" placeholder="Ej: &quot;15345987&quot;">
                    <span id="scontrasena" style="color: #ff0000;"></span>
                </div>
                <div class="col-md-12">
                    <label for="contrasena2">Confirmar contraseña</label>
                    <input class="form-control" type="password" name="contrasena2" id="contrasena2" placeholder="Ej: &quot;15345987&quot;">
                    <span id="scontrasena2" style="color: #ff0000;"></span>
                </div>
            </div>

            <button type="button" class="btn btn-md btn-primary" id="enviar" name="enviar">Enviar</button>
            
        </div>
		
	</div>
<?php require_once('comunes/scripts.php')?>
</body>
</html>