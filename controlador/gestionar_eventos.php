<?php 
	
	use modelo\gestionar_eventos;

	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new gestionar_eventos(); //instanca de la clase

		if(empty($_SESSION)){
			session_start();
		}
		
		if(isset($_SESSION['cedula'])){
			$cedula_bitacora = $_SESSION['cedula'];
		}
		else{
			$cedula_bitacora = "";
		}

 
		if(isset($_SESSION['rol'])){
			$rol_usuario = $_SESSION['rol'];
		}else{
			$rol_usuario = "";
		}

		$modulo = 6;

		if(isset($_POST['accion_evento'])){			
 
			$accion = $_POST['accion_evento'];

			if($accion=='eliminar_evento'){
				$objeto->set_nombre_evento($_POST['nombre_evento']);
				echo $objeto->eliminar($cedula_bitacora,$modulo);
			}
			else{

				$objeto->set_nombre_evento($_POST['nombre_evento']);
				$objeto->set_fecha_evento($_POST['fecha_evento']);
				$objeto->set_hora_evento($_POST['hora_evento']);
				$objeto->set_club_responsable_evento($_POST['club_responsable_evento']);
				$objeto->set_monto_evento($_POST['monto_evento']);
				$objeto->set_direccion_evento($_POST['direccion_evento']);
				$objeto->set_juez1($_POST['juez1']);
				$objeto->set_juez2($_POST['juez2']);
				$objeto->set_juez3($_POST['juez3']);

				if($accion=='registrar_evento'){

					echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
				}
				elseif($accion=='modificar_evento'){
					echo $objeto->modificar($rol_usuario,$cedula_bitacora,$modulo);
				}
			}			
 
			exit;

		}
 
		$listaconsulta = $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
        $consulta_clubes = $objeto->consulta_clubes();//metodo de mostrar los clubes en el option
		
		$permisos = $objeto->permisos($rol_usuario);

		if($permisos[0] == "true"){
			require_once("vista/".$pagina.".php");
		}else{
			echo "<center>No tienes acceso para consultar este modulo</center>";
		}
		
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>