<?php 
	
	use modelo\gestionar_clubes;

	if(is_file("vista/".$pagina.".php")){

		$objeto = new gestionar_clubes(); //instancia de la clase

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

		$modulo = 1;

		if(isset($_POST['accion_club'])){
			
			$accion = $_POST['accion_club'];

			if($accion=='eliminar_club'){
				$objeto->set_codigo_club($_POST['codigo_club']);
				echo $objeto->eliminar($cedula_bitacora,$modulo,$rol_usuario,);
				
			}else{
				  
				//asignando los valores a los atributos 
				$objeto->set_codigo_club($_POST['codigo_club']);
				$objeto->set_nombre_club($_POST['nombre_club']);
				$objeto->set_telefono_club($_POST['telefono_club']);
				$objeto->set_deporte_club($_POST['deporte_club']);
				$objeto->set_direccion_club($_POST['direccion_club']);

				if($accion=='registrar_club'){
					echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
				}
				else if($accion=='modificar_club'){
					echo $objeto->modificar($rol_usuario,$cedula_bitacora,$modulo);
				}
			}			

			exit;

		}

		$listaconsulta = $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
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