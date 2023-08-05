<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('comunes/cabecera.php') ?>
</head>
<body>
    <?php require_once('comunes/menu.php') ?>
    <?php require_once('comunes/modal.php') ?>
    <div class="container-fluid my-4 pt-4 shadow bg-white rounded" style="width:90%;">

		<div class="container-fluid mt-4 mb-3">
			<div class="row justify-content-between">
				<div class="col-md-9 mb-2">
					<div class="h4 text-dark">Reporte Estadistico de Cantidad Zona de Viviendas</div>
				</div>
			</div>
		</div>
        	 		
        <div class="container-fluid">
            <canvas id="grafica"></canvas>
        </div>
		
	</div>
    <?php require_once('comunes/scripts.php')?>
    <script src="js/chart.min.js"></script>
    <script src="js/reporte_cantidad_vivienda.js"></script>
</body>
</html>