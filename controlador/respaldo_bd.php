<?php 
	use modelo\respaldo_bd;
	if(is_file("vista/".$pagina.".php")){

		$objeto = new respaldo_bd(); //instancia de la clase

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

		$modulo = 15;

		if(isset($_POST['accion'])){
			$accion = $_POST['accion'];

			if($accion == 'respaldar'){
				echo $objeto->backup($rol_usuario,$cedula_bitacora, $modulo);
			}
			if($accion == 'restore'){
				$objeto->set_restorePoint($_POST['restorePoint']);
				echo $objeto->restore($rol_usuario,$cedula_bitacora, $modulo);
			}

			if($accion == 'eliminar'){
				$objeto->set_restorePoint($_POST['restorePoint']);
				echo $objeto->eliminarRestorePoint($rol_usuario,$cedula_bitacora, $modulo);
			}

			exit;
		}

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