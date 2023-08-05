<?php 

	use modelo\reporte_resultados;

	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new reporte_resultados(); 
		
		if(isset($_POST['generar_reporte_resultados'])){

			$objeto->set_evento_reporte_resultados($_POST['evento_reporte_resultados']);

			$objeto->generarPDF();
			
		}

		$consulta_eventos = $objeto->consulta_eventos();

		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}
 
?>