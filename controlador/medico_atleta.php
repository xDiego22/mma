<?php  
	use modelo\medico_atleta;

    if(is_file("vista/".$pagina.".php")){

		$objeto = new medico_atleta(); //instancia de clase

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

		$modulo = 4;
        
		if(isset($_POST['accion_medico'])){	

            $accion = $_POST['accion_medico'];

			if($accion=='eliminar'){
				$objeto->set_nombre_atleta($_POST['nombre_atleta']);
				echo $objeto->eliminar($cedula_bitacora,$modulo,$rol_usuario);
				
			}
            else{
                //nuevo de medico
				$objeto->set_nombre_atleta($_POST['nombre_atleta']);
				$objeto->set_medicamento_atleta($_POST['medicamento_atleta']);
				$objeto->set_enfermedad_atleta($_POST['enfermedad_atleta']);

				$objeto->set_discapacidad_atleta($_POST['discapacidad_atleta']);
				$objeto->set_dieta_atleta($_POST['dieta_atleta']);

				$objeto->set_enfermedades_pasadas($_POST['enfermedades_pasadas']);
				$objeto->set_nombre_parentesco($_POST['nombre_parentesco']);

				$objeto->set_telefono_parentesco($_POST['telefono_parentesco']);
				$objeto->set_relacion_parentesco($_POST['relacion_parentesco']);

                if($accion=='registrar'){
					echo $objeto->registrar($rol_usuario, $cedula_bitacora,$modulo);
					
				}
				else if($accion=='modificar'){
					echo $objeto->modificar($rol_usuario, $cedula_bitacora,$modulo);
				}
                
            }
            exit;
        }
 
		$listaconsulta = $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
		$consulta_atletas = $objeto->consulta_atletas();
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