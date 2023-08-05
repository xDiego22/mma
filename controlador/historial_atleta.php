<?php 
	
	use modelo\historial_atleta;

    if(is_file("vista/".$pagina.".php")){

		$objeto = new historial_atleta(); 

		if(isset($_POST['accion_historial'])){

			$accion = $_POST['accion_historial'];

			if($accion=='mostrar_resultado'){
				echo $objeto->mostrar_resultado($_POST['atleta']);
				exit;
			} 
		}

		
	
		$consulta_atletas = $objeto->consulta_atletas();

		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>