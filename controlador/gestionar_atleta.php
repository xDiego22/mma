<?php 

	use modelo\gestionar_atleta;
	if(is_file("vista/".$pagina.".php")){

		$objeto = new gestionar_atleta(); //instancia de la clase

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

		$modulo = 3;

		if(isset($_POST['accion_atletas'])){

			$accion = $_POST['accion_atletas'];
			if($accion=='consultar'){
				echo $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
				exit;
			}

			if($accion=='eliminar_atletas'){
				$objeto->set_cedula_atleta($_POST['cedula_atleta']);
				echo $objeto->eliminar($cedula_bitacora,$modulo,$rol_usuario);

			}else{
				
				//asignando los valores a los atributos 
				$objeto->set_club_atleta($_POST['club_atleta']);
				$objeto->set_cedula_atleta($_POST['cedula_atleta']);
				$objeto->set_nombres_atleta($_POST['nombres_atleta']);
				$objeto->set_apellidos_atleta($_POST['apellidos_atleta']);
				$objeto->set_peso_atleta($_POST['peso_atleta']);
				$objeto->set_estatura_atleta($_POST['estatura_atleta']);
				$objeto->set_fecha_atleta($_POST['fecha_atleta']);
				$objeto->set_telefono_atleta($_POST['telefono_atleta']);
				$objeto->set_sexo_atleta($_POST['sexo_atleta']);
				$objeto->set_deporte_atleta($_POST['deporte_atleta']);
				$objeto->set_categoria_atleta($_POST['categoria_atleta']);
				$objeto->set_fecha_ingreso_atleta($_POST['fecha_ingreso_atleta']);
				$objeto->set_entrenador_atleta($_POST['entrenador_atleta']);
				
				
				if($accion=='registrar_atletas'){
					
					if(isset($_FILES['imagenarchivo'])){	
						
						if (($_FILES['imagenarchivo']['size'] / 1024) < 1024) {
							
							move_uploaded_file($_FILES['imagenarchivo']['tmp_name'],'img/atletas/'.$_POST['cedula_atleta'].'.png');
						} 
					}
					echo $objeto->registrar($rol_usuario,$cedula_bitacora,$modulo);
					
				}
				elseif($accion=='modificar_atletas'){
					if(isset($_FILES['imagenarchivo'])){	
						
						if (($_FILES['imagenarchivo']['size'] / 1024) < 1024) {
							
							move_uploaded_file($_FILES['imagenarchivo']['tmp_name'],'img/atletas/'.$_POST['cedula_atleta'].'.png');
						} 
					}
					echo $objeto->modificar($rol_usuario, $cedula_bitacora,$modulo);
				}	  	
			}
			

			exit;

		}
 
		// $listaconsulta = $objeto->consultar($rol_usuario,$cedula_bitacora,$modulo);
		$consulta_clubes = $objeto->consulta_clubes();//metodo de mostrar los clubes en el option
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