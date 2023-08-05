<?php 
	 
	use modelo\reporte_eventos;
 
	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new reporte_eventos(); 
		
		if(isset($_POST['generar_reporte_eventos'])){

			$objeto->set_nombre_reporte_evento($_POST['nombre_reporte_evento']);
			$objeto->set_fecha_reporte_evento($_POST['fecha_reporte_evento']);
			

			$objeto->generarPDF();
			
		}

		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>