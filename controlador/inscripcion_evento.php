<?php 
 
	use modelo\inscripcion_evento;

	if(is_file("vista/".$pagina.".php")){

		$objeto = new inscripcion_evento(); //instancia de clase

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

		$modulo = 10;

		if(isset($_POST['accion_inscripcion'])){
			
			$accion = $_POST['accion_inscripcion'];
			
			if($accion=='mostrarinscritos'){
				echo $objeto->muestra_inscritos($_POST['evento'], $rol_usuario,$cedula_bitacora,$modulo);
				exit;
			} 
			if($accion=='consulta_cedula'){
				$objeto->set_cedula_inscripcion($_POST['cedula_inscripcion']); 
				echo $objeto->consulta_cedula();  
				exit;
			}
			if($accion=='eliminaatleta'){
				echo $objeto->elimina_atletas($_POST['evento'], $_POST['cedula_inscripcion'],$cedula_bitacora,$modulo);
				exit;
			}
			//asignando los valores a los atributos  						

			if($accion=='incluir_evento'){
				$objeto->set_evento_inscripcion($_POST['evento_inscripcion']); 
				$objeto->set_cedula_inscripcion($_POST['cedula_inscripcion']);
				$objeto->set_nombre_inscripcion($_POST['nombre_inscripcion']);
				$objeto->set_sexo_inscripcion($_POST['sexo_inscripcion']);
				$objeto->set_peso_inscripcion($_POST['peso_inscripcion']);
				$objeto->set_fechadenacimiento($_POST['fechadenacimiento']);
				$objeto->set_estado($_POST['estado']);
				echo $valor = $objeto->incluir($rol_usuario,$cedula_bitacora,$modulo);
				//aqui si uno quiere ouede quitar esta condicion de valor 
				if($valor !=  "Ya existe atleta en el evento"){
					if(isset($_FILES['imagenarchivo'])){	
					
						if (($_FILES['imagenarchivo']['size'] / 1024) < 1024) {

							move_uploaded_file($_FILES['imagenarchivo']['tmp_name'],'img/atletas/'.$_POST['cedula_inscripcion'].'.png');
							
						} 
					}
				}
				
				exit;
				
				
			}
		
			
		}

		$consulta_eventos = $objeto->consulta_eventos();
		
		$permisos = $objeto->permisos($rol_usuario);

		if($permisos[0] == "true"){
			$objeto->registrar_bitacora($cedula_bitacora,"Ha visualizado Inscripcion a Eventos",$modulo);
			require_once("vista/".$pagina.".php");
		}else{
			echo "<center>No tienes acceso para consultar este modulo</center>";
		}
		
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>