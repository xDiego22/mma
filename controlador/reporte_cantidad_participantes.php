<?php 

    use modelo\reporte_cantidad_participantes;
	
	if(is_file("vista/".$pagina.".php")){

		$objeto = new reporte_cantidad_participantes();

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

		$modulo = 21;
        
		if(isset($_POST['accion'])){	

            $accion = $_POST['accion'];

			if($accion=='evento'){
				$objeto->set_evento($_POST['evento']);
				echo $objeto->cantidades();
			}
            exit;
        }

		$consulta_eventos = $objeto->consulta_eventos();

		$permisos = $objeto->permisos($rol_usuario);

		if($permisos[0] == "true"){
			$objeto->registrar_bitacora($cedula_bitacora,"Ha visualizado reportes estadisticos de cantidad de participantes",$modulo);
			require_once("vista/".$pagina.".php");
		}else{
			echo "<center>No tienes acceso para consultar este modulo</center>";
		}
		
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>