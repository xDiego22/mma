<nav class="navbar navbar-expand-xl navbar-dark" style="background:#191E21;">

	<a class="navbar-brand" href="?pagina=principal">
		<img src="img/logo-menu.png" alt="" width="40px"><!--imagen de logo-->
		Menu Principal
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menudropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span><!--span que da estilo/forma de boton-->
	</button>

	<!--contenido de la barra de navegacion-->

	<div class="collapse navbar-collapse" id="menudropdown"><!--clase para estilo de ocultarse y id para que funcione con el boton responsive-->

		<ul class="navbar-nav mr-auto my-2 my-lg-0 "><!--lista del contenido de la barra de navegacion-->

		<?php  

			if(empty($_SESSION)){
				session_start();
			}

			if(isset($_SESSION['cedula'])){
				$usuario = $_SESSION['cedula'];
			}	  
			else{
				$usuario = "";
			}

			if(isset($_SESSION['modulo'])){
				$modulo = $_SESSION['modulo'];
			}	  
			else{
				$modulo = "";
			}

			if(!empty($modulo)){
				
				$contador = count($modulo);

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="1") {

						$clubes=$modulo[$i];
						break;
					}else{
						$clubes="";
					}
				} 

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="2") {

						$personal=$modulo[$i];
						break;
					}else{
						$personal="";
					}
				} 

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="3") {

						$atleta=$modulo[$i];
						break;
					}else{
						$atleta="";
					}
				} 

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="4") {

						$medico=$modulo[$i];
						break;
					}else{
						$medico="";
					}
				}

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="5") {

						$socioeconomico=$modulo[$i];
						break;
					}else{
						$socioeconomico="";
					}
				}
				
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="6") {

						$eventos=$modulo[$i];
						break;
					}else{
						$eventos="";
					}
				} 

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="7") {

						$usuarios=$modulo[$i];
						break;
					}else{
						$usuarios="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="8") {

						$bitacora=$modulo[$i];
						break;
					}else{
						$bitacora="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="9") {

						$roles_permisos=$modulo[$i];
						break;
					}else{
						$roles_permisos="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="10") {

						$inscripcion=$modulo[$i];
						break;
					}else{
						$inscripcion="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="11") {

						$emparejamientos_combates=$modulo[$i];
						break;
					}else{
						$emparejamientos_combates="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="12") {

						$resultados_eventos=$modulo[$i];
						break;
					}else{
						$resultados_eventos="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="13") {

						$historial_atleta=$modulo[$i];
						break;
					}else{
						$historial_atleta="";
					}
				}
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="15") {

						$reporte_atleta=$modulo[$i];
						break;
					}else{
						$reporte_atleta="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="16") {

						$reporte_personal=$modulo[$i];
						break;
					}else{
						$reporte_personal="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="17") {

						$reporte_eventos=$modulo[$i];
						break;
					}else{
						$reporte_eventos="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="18") {

						$reporte_resultados=$modulo[$i];
						break;
					}else{
						$reporte_resultados="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="19") {
						$reporte_emparejamientos=$modulo[$i];
						break;
					}else{
						$reporte_emparejamientos="";
					}
				} 
				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="20") {
						$reporte_historial=$modulo[$i];
						break;
					}else{
						$reporte_historial="";
					}
				} 

				for ($i=0; $i <$contador ; $i++) {
					if ($modulo[$i]=="21") {
						$reportes=$modulo[$i];
						break;
					}else{
						$reportes="";
					}
				}

			}
			
		?>

		<?php 
			if($modulo !== "" and $usuario!==""){ 
		?>	
			<!--clubes-->
			<li class="nav-item dropdown">
				<?php 
					if($clubes == "1" or $personal == "2"){
				?>
						<a class="nav-link dropdown-toggle" href="#" role="button" 		data-toggle="dropdown" aria-expanded="false"><img src="img/iconos/clubes.png" style="width:20px;margin-right:10px;">Clubes</a>

						<div class="dropdown-menu">
							<?php
								if($clubes == "1"){
							?>
									<a class="dropdown-item" href="?pagina=gestionar_clubes"><img src="img/iconos/clubes.png" style="width:30px;margin-right:10px;">Clubes</a>
							<?php
								}
								
								if($personal == "2"){
							?>
									<a class="dropdown-item" href="?pagina=gestionar_personal"><img src="img/iconos/personal.png" style="width:30px;margin-right:10px;">Personal</a>
							<?php 
								}
							?>
						</div>
					<?php 
						}
					?>
			</li>
			
			<!--atletas-->
			<li class="nav-item dropdown">
				<?php 
					if($atleta == "3" or $medico == "4" or $socioeconomico == "5" or $historial_atleta == "13"){
				?>
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img src="img/iconos/atleta.png" style="width:20px;margin-right:10px;">Atletas</a>

						<div class="dropdown-menu">
							<?php
								if($atleta == "3"){
							?>
									<a class="dropdown-item" href="?pagina=gestionar_atleta"><img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">Atletas</a>
							<?php
								}
								
								if($medico == "4"){
							?>
									<a class="dropdown-item" href="?pagina=medico_atleta"><img src="img/iconos/salud.png" style="width:30px;margin-right:10px;">Datos Medicos</a>
							<?php
								}
							
								if($socioeconomico == "5"){
							?>
									<a class="dropdown-item" href="?pagina=socioeconomico_atleta"><img src="img/iconos/socioeconomico.png" style="width:30px;margin-right:10px;">Datos Socioeconomicos</a>
							<?php
								}
								if($historial_atleta == "13"){
							?>
									<a class="dropdown-item" href="?pagina=historial_atleta"><img src="img/iconos/historial.png" style="width:30px;margin-right:10px;">Historial del Atleta</a>
							<?php 
								}
								
							?>
						</div>
				<?php 
					}
				?>
			</li>

			<!--eventos-->
			<li class="nav-item dropdown">
				<?php 
					if($eventos == "6" or $inscripcion == "10" or $emparejamientos_combates == "11" or $resultados_eventos == "12"){
				?>
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img src="img/iconos/trofeo.png" style="width:20px;margin-right:10px;">Eventos</a>

						<div class="dropdown-menu">
							<?php
								if($eventos == "6"){
							?>
									<a class="dropdown-item" href="?pagina=gestionar_eventos"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</a>
							<?php
								}
								if($inscripcion == "10"){
							?>
									<a class="dropdown-item" href="?pagina=inscripcion_evento"><img src="img/iconos/inscribir.png" style="width:30px;margin-right:10px;">Inscripcion a Evento</a>
							<?php 
								}
								
								if($emparejamientos_combates == "11"){
							?>
									<a class="dropdown-item" href="?pagina=emparejamiento_combates">
										<img src="img/iconos/ring.png" style="width:30px;margin-right:10px;">
										Emparejamientos y Combates
									</a>
							<?php 
								}
								
								if($resultados_eventos == "12"){
							?>
								<a class="dropdown-item" href="?pagina=resultados_eventos"><img src="img/iconos/ganador.png" style="width:30px;margin-right:10px;">Resultados de Eventos</a>
							<?php 
								}
							?>
						</div>
				<?php 
					}
				?>
			</li>

			<!--reportes-->
			<li class="nav-item dropdown">
				<?php 
					if($reportes == "21"){
				?>
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img src="img/iconos/reporte.png" style="width:20px;margin-right:10px;">Reportes</a>

					<div class="dropdown-menu">
						
						<a class="dropdown-item" href="?pagina=reporte_atleta"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Atletas</a>
						
						<a class="dropdown-item" href="?pagina=reporte_personal"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Personal</a>
						
						<a class="dropdown-item" href="?pagina=reporte_eventos"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Eventos</a>
						
						<a class="dropdown-item" href="?pagina=reporte_resultados"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Resultados Eventos</a>
						
						<a class="dropdown-item" href="?pagina=reporte_historial_atleta"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Historial de Atletas</a>

						<a class="dropdown-item" href="?pagina=reporte_cantidad_participantes"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte Estadistico de Cantidad de Participantes</a>

						<a class="dropdown-item" href="?pagina=reporte_cantidad_vivienda"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte Estadistico de Cantidad Zona de Vivienda</a>
						
					</div>
				<?php 
					}
				?>
			</li> 
			
			<!--seguridad-->
			<li class="nav-item dropdown">
				<?php  
					if($bitacora == "8" or $roles_permisos == "9" or $usuarios == "7"){
				?>
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img src="img/iconos/seguridad.png" style="width:20px;margin-right:10px;">Seguridad</a>
					<div class="dropdown-menu">
						<?php 
							if($bitacora == "8"){
						?>
								<a class="dropdown-item" href="?pagina=bitacora_usuario"><img src="img/iconos/bitacora.png" style="width:30px;margin-right:10px;">Bitacora de Usuario</a>
						<?php 
							}
							
							if($roles_permisos == "9"){
						?>
								<a class="dropdown-item" href="?pagina=roles_permisos"><img src="img/iconos/rol.png" style="width:30px;margin-right:10px;">Roles y Permisos</a>
						<?php 
							}

							if($usuarios == "7"){
						?>
							<a class="dropdown-item" href="?pagina=gestionar_usuarios"><img src="img/iconos/usuario.png" style="width:30px;margin-right:10px;">Usuarios</a>
						<?php  
							}
						?>
					</div>
				<?php  
					}
				?>
			</li>

		<?php  
	    	} 
			if($usuario !== ""){
	    ?>
		<!-- demas botones -->
		    <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Ayudas</a>
		 
		        <div class="dropdown-menu">
					<a class="dropdown-item" href="?pagina=manual"><img src="img/iconos/manual.png" style="width:30px;margin-right:10px;">Manual Interactivo</a>
		        </div>
		    </li>

		    <li class="nav-item">
		        <a class="nav-link" href="?pagina=acerca">Acerca de</a>
		    </li>

			<?php 
				}
			?>
		
	    </ul>

	    <?php 
			if( $usuario !== ""){
		?>		
				<ul class="navbar-nav mr-2">
					<li class="nav-link">
						<i class="bi bi-chat-fill mr-2" data-toggle="modal" data-target="#modal_mensajes">
							<span class="ml-2">Mensajes</span>
						</i>
					</li>
				
					<a href="?pagina=cerrar_sesion" class="btn btn-danger"><i class="bi bi-box-arrow-left mr-1"></i>Salir</a>
				</ul>
				
	    		
	    <?php  
			}
			else{
		?>
	    	<ul class="navbar-nav">
				<a href="?pagina=inicio_sesion" class="btn btn-danger"><i class="bi bi-box-arrow-in-right mr-1"></i>Entrar</a>
			</ul>
				
	    <?php  
			}
		?>
 	</div>
 
</nav>

<?php require_once("comunes/modales-socket.php");?>