<?php 
	
	use modelo\emparejamiento_combates;

	if(is_file("vista/".$pagina.".php")){

		function verifica($x){
			if (!empty($x)){
				return true;
			}else{
				return false;
			}
		}

		$objeto = new emparejamiento_combates(); 

		if(empty($_SESSION)){
			session_start();
		}
		
		if(isset($_SESSION['cedula'])){
			$cedula_bitacora = $_SESSION['cedula'];
		}
		else{
			$cedula_bitacora = "";
		}
		
		$modulo = 11;
 
		if(isset($_SESSION['rol'])){
			$rol_usuario = $_SESSION['rol'];
		}else{
			$rol_usuario = "";
		}

		if(isset($_POST['accion'])){
			
			$accion = $_POST['accion']; 
			
			if($accion=='mostrar'){
				echo $objeto->coincidentes($_POST['evento'],$_POST['sexo'],$_POST['edad'],$_POST['peso'],$_POST['orden'],$cedula_bitacora,$modulo);
				exit;
			}
			if($accion=='guardar'){
				echo $objeto->guarda($_POST['evento'],$_POST['atleta'],$cedula_bitacora,$modulo);
				exit;
			}
			if($accion='siguiente_ronda'){

				if(!empty($_POST['contador'])){
					for($i=0; $i < count($_POST['contador']);$i++){
						
						if(verifica($_POST['atleta'.$i])){
							echo $objeto->ganador_ronda($_POST['evento_id'],$_POST['atleta'.$i],$_POST['ronda'],$cedula_bitacora,$modulo);
						}
					
					}
				}else{
					echo "debe enviar informacion correcta";
					
				}
				
				exit;
			}
		  	
		}

		$consulta_eventos = $objeto->consulta_eventos();
		$permisos = $objeto->permisos($rol_usuario);


        if($permisos[0] == "true"){ 

			//$objeto->registrar_bitacora($cedula_bitacora,"Ha visualizado Emparejamientos y Combates",$modulo);
			require_once("vista/".$pagina.".php");
		}else{
			echo "<center>No tienes acceso para consultar este modulo</center>";
		}
		
		
		
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>