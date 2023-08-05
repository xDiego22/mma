<?php 

	use modelo\reporte_historial_atleta;

	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new reporte_historial_atleta(); 
		
		if(isset($_POST['generar_reporte_historial_atleta'])){

			$objeto->set_atleta_reporte($_POST['atleta_reporte']);

			$objeto->generarPDF();
			
		}

		$consulta_atletas = $objeto->consulta_atletas();

		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}
 
?>