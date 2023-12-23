<?php 

	use modelo\resultados_eventos;
 
	if(is_file("vista/".$pagina.".php")){

		$objeto = new resultados_eventos(); //instancia de clase

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

		$modulo = 12;

		if(isset($_POST['accion_resultados'])){

			$accion = $_POST['accion_resultados'];

			if($accion =='consultar'){
				echo $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
				
			}

			if($accion =='select_ronda'){
				echo $objeto->consulta_rondas($_POST['nombre_evento']);
			}
			if($accion =='select_atleta'){
				echo $objeto->consulta_atletas($_POST['nombre_evento'], $_POST['ronda']);
			}

			

			if ($accion =='eliminar_resultados'){
				$objeto->set_nombre_evento($_POST['nombre_evento']);
				$objeto->set_atleta_ganador($_POST['atleta_ganador']);
				$objeto->set_atleta_perdedor($_POST['atleta_perdedor']); 
				$objeto->set_ronda($_POST['ronda']);
				$objeto->set_forma_ganar($_POST['forma_ganar']);
			
				echo $objeto->eliminar($cedula_bitacora,$modulo,$rol_usuario); 
			} 
			
				
			if($accion=='incluir_resultados'){
				$objeto->set_nombre_evento($_POST['nombre_evento']);
				$objeto->set_atleta_ganador($_POST['atleta_ganador']);
				$objeto->set_atleta_perdedor($_POST['atleta_perdedor']); 
				$objeto->set_ronda($_POST['ronda']);
				$objeto->set_forma_ganar($_POST['forma_ganar']);
				
				echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
			}
			
			
			exit;
		}
 
		
		$consulta_eventos = $objeto->consulta_eventos();

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