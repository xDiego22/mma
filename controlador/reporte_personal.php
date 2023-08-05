<?php 
	
	use modelo\reporte_personal;

	if(is_file("vista/".$pagina.".php")){

		$objeto = new reporte_personal(); 
		
		if(isset($_POST['generar_reporte_personal'])){

			$objeto->set_club_reporte_personal($_POST['club_reporte_personal']);
			$objeto->set_cedula_reporte_personal($_POST['cedula_reporte_personal']);
			$objeto->set_nombres_reporte_personal($_POST['nombres_reporte_personal']);
			$objeto->set_apellidos_reporte_personal($_POST['apellidos_reporte_personal']);
			$objeto->set_cargo_reporte_personal($_POST['cargo_reporte_personal']);
			

			$objeto->generarPDF();
			
		}
		
		$consulta_clubes = $objeto->consulta_clubes();//metodo de mostrar los clubes en el option 
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>