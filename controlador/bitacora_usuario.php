<?php 
	use modelo\bitacora_usuario;

	if(is_file("vista/".$pagina.".php")){
		$objeto = new bitacora_usuario(); //instancia de clase

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

		$modulo = 8;

		if(isset($_POST['accion'])){				
			echo $objeto->consultar($rol_usuario);		
			exit;
		}

		$listaconsulta = $objeto->consultar($rol_usuario);
		$permisos = $objeto->permisos($rol_usuario);

		if($permisos[0] == "true"){
			require_once("vista/".$pagina.".php");
			exit;
		}else{
			echo "<center>No tienes acceso para consultar este modulo</center>";
		}
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>