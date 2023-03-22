<?php 

    use modelo\socioeconomico_atleta;

    if(is_file("vista/".$pagina.".php")){
		$objeto = new socioeconomico_atleta(); //instancia de clase

		
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

		$modulo = 5;
        
		if(isset($_POST['accion_socioeconomico'])){
				
            $accion = $_POST['accion_socioeconomico'];

           
			if($accion=='eliminar'){
				$objeto->set_nombre_atleta($_POST['nombre_atleta']);
				echo $objeto->eliminar($cedula_bitacora,$modulo);
			}
            else{
                //nuevo socioeconomico
				$objeto->set_nombre_atleta($_POST['nombre_atleta']);
				$objeto->set_tipo_vivienda($_POST['tipo_vivienda']);
				$objeto->set_zona_vivienda($_POST['zona_vivienda']);

				$objeto->set_propiedad_vivienda($_POST['propiedad_vivienda']);
				$objeto->set_habitantes_vivienda($_POST['habitantes_vivienda']);

				$objeto->set_internet($_POST['internet']);
				$objeto->set_luz($_POST['luz']);

				$objeto->set_agua($_POST['agua']);
				$objeto->set_telefono_residencial($_POST['telefono_residencial']);
				
				$objeto->set_cable($_POST['cable']);

                if($accion=='registrar'){
					echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
					
				}
				else if($accion=='modificar'){
					echo $objeto->modificar($rol_usuario,$cedula_bitacora,$modulo);
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