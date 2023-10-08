<?php 

	use modelo\perfil;

	if(is_file("vista/".$pagina.".php")){
		if(empty($_SESSION)){
			session_start();
		}
	
		$objeto = new perfil();

		 if(isset($_POST['accion'])){	

            $accion = $_POST['accion'];

            if($accion == "cambiar"){

				$objeto->set_cedula_usuario($_SESSION['cedula']);
                $objeto->set_contrasena_actual($_POST['contrasena_actual']);
				$objeto->set_contrasena_nueva($_POST['contrasena_nueva']);
				
                echo $objeto->cambiarContrasena();
				
            }

			if ($accion == 'consultar'){
				$objeto->set_cedula_usuario($_SESSION['cedula']);
				echo $objeto->consultarPerfil();
			}

			if ($accion == 'editar'){
				$objeto->set_cedula_usuario($_SESSION['cedula']);
				$objeto->set_nombre($_POST['nombre_perfil']);
				$objeto->set_correo($_POST['correo_perfil']);
				echo $objeto->editarPerfil();
			}

            exit();

        }

		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>