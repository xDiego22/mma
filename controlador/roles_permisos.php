<?php 
    
	use modelo\roles_permisos;

	if(is_file("vista/".$pagina.".php")){

		function verifica2($valor){
			if (empty($valor)) {
				return "false";
				
			}else{
				return $valor;
			}
		}	

        $objeto = new roles_permisos(); //instancia de clase

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

		$modulo = 9;

		if(isset($_POST['accion'])){			

			$accion = $_POST['accion'];

			if($accion=='eliminar'){
				$objeto->set_nombre($_POST['nombre_rol']);
				echo $objeto->eliminar($cedula_bitacora,$modulo);
				exit;
			}  
			if($accion=='registrar'){
				
				$objeto->set_nombre($_POST['nombre_rol']);
				$objeto->set_descripcion($_POST['descripcion_rol']);
 
				$objeto->set_modulo_club($_POST['modulo_club']);
				$objeto->set_modulo_personal($_POST['modulo_personal']);
				$objeto->set_modulo_atletas($_POST['modulo_atletas']);
				$objeto->set_modulo_medicos($_POST['modulo_medicos']);
				$objeto->set_modulo_socioeconomicos($_POST['modulo_socioeconomicos']);
				$objeto->set_modulo_eventos($_POST['modulo_eventos']);
				$objeto->set_modulo_usuarios($_POST['modulo_usuarios']);
				$objeto->set_modulo_bitacora($_POST['modulo_bitacora']);
				$objeto->set_modulo_roles($_POST['modulo_roles']);
				$objeto->set_modulo_inscripcion($_POST['modulo_inscripcion']);
				$objeto->set_modulo_emparejamientos($_POST['modulo_emparejamientos']);
				$objeto->set_modulo_resultados($_POST['modulo_resultados']);
				$objeto->set_modulo_historial($_POST['modulo_historial']);
				$objeto->set_modulo_reportes($_POST['modulo_reportes']);

				echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
				exit;
 
			}
			if($accion=='modificar') {
				$objeto->set_nombre($_POST['nombre_rol']);
				$objeto->set_descripcion($_POST['descripcion_rol']);
				echo $objeto->modificar($rol_usuario,$cedula_bitacora,$modulo);
				exit;
			}	
			if($accion=="mostrar_permisos"){

				$objeto->set_rol_modulo($_POST['rol_modulo']);
				$consulta_permisos = $objeto->consulta_permisos();
				echo $consulta_permisos;
				exit;
			}	 
			if($accion=="actualizar_permiso"){
  
				$contador = count($_POST['modulo_id']);
				$modulo_2 = $_POST['modulo_id'];

				$objeto->set_rol_2($_POST['rol_modulo2']);
				
				for ($i=0; $i < $contador; $i++) {
					
					$registrar = verifica2($_POST['registrar'.$i]);
					$consultar = verifica2($_POST['consultar'.$i]);
					$modificar = verifica2($_POST['modificar'.$i]);
					$eliminar =verifica2($_POST['eliminar'.$i]);
					
					echo $objeto->actualizar_permisos($modulo_2[$i],$registrar,$consultar,$modificar,$eliminar);
				}

				$objeto->registrar_bitacora($cedula_bitacora,"Ha actualizado permisos",$modulo);
			
				exit;
			}


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