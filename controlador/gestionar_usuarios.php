<?php 
	use modelo\gestionar_usuarios;

	if(is_file("vista/".$pagina.".php")){


		$objeto = new gestionar_usuarios(); 

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

		$modulo = 7; //modulo para bitacora
 
		if(isset($_POST['accion_usuarios'])){			

			$accion = $_POST['accion_usuarios'];

			if($accion=='eliminar_usuarios'){
				$objeto->set_cedula_usuarios($_POST['cedula_usuarios']);

				echo $objeto->eliminar($cedula_bitacora,$modulo);

			} else{
 
				
				$objeto->set_cedula_usuarios($_POST['cedula_usuarios']);
				$objeto->set_nombre_usuarios($_POST['nombre_usuarios']);
				$objeto->set_contrasena_usuarios($_POST['contrasena_usuarios']);
				$objeto->set_rol_usuario($_POST['rol_usuario']);
				
	
				
				if($accion=='registrar_usuarios'){
					echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
				}
				elseif($accion=='modificar_usuarios'){
					echo $objeto->modificar($rol_usuario,$cedula_bitacora,$modulo);
				}
			}
			
			exit;
			
		}

		
		$listaconsulta = $objeto->consultar($rol_usuario, $cedula_bitacora,$modulo);
		$consulta_roles =  $objeto->consulta_roles();

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