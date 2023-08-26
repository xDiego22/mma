<?php 
	
	use modelo\gestionar_personal;

	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new gestionar_personal(); //instancia de clase

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

		$modulo = 2;


		if(isset($_POST['accion_personal'])){			

			$accion = $_POST['accion_personal'];
 
			if($accion=='eliminar_personal'){
				$objeto->set_cedula_personal($_POST['cedula_personal']);
				echo $objeto->eliminar($cedula_bitacora,$modulo,$rol_usuario);
			}else{
				
				$objeto->set_club_personal($_POST['club_personal']);
				$objeto->set_cedula_personal($_POST['cedula_personal']);
				$objeto->set_nombres_personal($_POST['nombres_personal']);
				$objeto->set_apellidos_personal($_POST['apellidos_personal']);
				$objeto->set_telefono_personal($_POST['telefono_personal']);
				$objeto->set_cargo_personal($_POST['cargo_personal']);
				$objeto->set_direccion_personal($_POST['direccion_personal']);
				
				if($accion=='registrar_personal'){
					echo $objeto->registrar($rol_usuario, $cedula_bitacora,$modulo);
				}
				else if($accion=='modificar_personal'){
					echo $objeto->modificar($rol_usuario, $cedula_bitacora,$modulo);
				}
			}			
		
			exit;

		} 

		$listaconsulta = $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
        $consulta_clubes = $objeto->consulta_clubes();

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