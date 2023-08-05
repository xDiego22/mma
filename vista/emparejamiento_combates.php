<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once('comunes/cabecera.php') ?>
	
</head>
<body> 

	<?php require_once('comunes/menu.php') ?>
	<?php require_once('comunes/modal.php') ?>
 
	<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:85%;">

		<div class="container-fluid text-center h4 text-dark my-3">
			Emparejamientos y Combates
		</div>

		<div class="row">
			<div class="col-md-12">
				<label for="evento_emparejamiento">Eventos</label>
				<select class="form-control" name="evento_emparejamiento" id="evento_emparejamiento" onchange='select_evento();'>
					<option value="" hidden="" selected="hidden">Seleccionar Evento</option>
					<?php
						if(!empty($consulta_eventos)){
							echo $consulta_eventos;
						}
					?>		
				</select> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<label for="sexo">Sexo</label>
				<select class="form-control" name="sexo" id="sexo">
					<option value="" hidden="" selected="hidden">Seleccione</option>
					<option value=""></option>
					<option value="Masculino">Masculino</option>	
					<option value="Femenino">Femenino</option>	
				</select>
			</div>
			<div class="col-md-4">
				<label for="edad">Edad</label>
				<select class="form-control" name="edad" id="edad">
					<option value="" hidden="" selected="hidden">Seleccione</option>
					<option value=""></option>
					<option value="1">11 a 13</option>	
					<option value="2">14 a 16</option>
					<option value="3">17 a 20</option>
					<option value="4">21 +</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="peso">Peso</label>
				<select class="form-control" name="peso" id="peso">
					
					
				</select>
			</div>
		</div>

		
		<div class="row mt-4 mb-2">
			<div class="col text-center">
				<button type="button" class="btn btn-danger" id="emparejar_combate" name="emparejar_combate">Guardar Resultado</button>
			</div>
		</div>
	</div>
	
	<?php 
		if($permisos[0] == "true"){
		?>

	<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:90%;"> 

		<div class="container-fluid">
			<div class="row"> 
				<div class="col-md-12 text-center mb-3 h5">
					Lista de participantes al Evento
				</div>
			</div>
		</div>

		
		<div class="container-fluid">					
			<div class="row">
				<div class="col-md-12 text-center" style="height: 400px;overflow: auto;">
					<table class="table table-striped table-hover">
						<thead class="thead-dark ">
							<tr> 
								<th style="display:none">id_atleta</th> 
								<th>Foto</th>
								<th>Cedula</th>
								<th>Nombres</th>
								<th>Sexo</th>
								<th>Edad</th>
								<th>Peso</th>
							</tr>
						</thead>
						<tbody id="lista_coincidentes">
							
						</tbody>
					</table>
				</div>
			</div>		
		</div>
		
	</div> <!-- fin de container de emparejar -->				
	
	<div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:90%;"> 
		
		<div class="container-fluid">
			<div class="row justify-content-between"> 
				<div class="col-md-9 mb-3 h5">
					Tabla de Enfrentamientos
				</div>
				<div class="col-sm-2 mb-1">
					<button type="button" id="siguiente_ronda" name="siguiente_ronda" class="btn btn-success"><i class="bi bi-arrow-right mr-1"></i>Siguiente</button>
				</div>
			</div>
		</div>
		 
		<div class="container-fluid">						
			<div class="row">
				<div class="col-md-12 text-center"  style="height: 400px;overflow: auto;">

					<form id="formulario_emparejamiento">

						<input type="text" name="accion" value="siguiente_ronda" style="display:none">
						
						<input type="text" id="evento_id" name="evento_id" style="display:none;">
						<input type="text" value="2" id="ronda" name="ronda" style="display:none;">

						<table class="table table-striped table-hover">
							<thead class="thead-dark">
								
								<tr> 
									<th style="display:none;">contador</th>
									<th><i class="bi bi-check-circle"></i></th>
									<th style="display:none">Cod.Atleta 1</th>
									<th style="display:none;">text</th>
									<th></th>
									<th>Atleta 1</th> 
									<th>VS</th>
									<th><i class="bi bi-check-circle"></i></th>
									<th style="display:none">Cod.Atleta 2</th> 
									<th style="display:none;">text</th>
									<th></th>
									<th>Atleta 2</th>
									<th style="display:none;">contador2</th>
								</tr>
							</thead>
							<tbody id="lista_emparejada">
								
							</tbody>
						</table>
					</form>
				</div>
			</div>							
		</div>	
			
	</div>
    <?php 
		}
	?>
	<?php require_once('comunes/scripts.php')?>
	<script type="text/javascript" src="js/emparejamiento_combates.js"></script>
</body>
</html>