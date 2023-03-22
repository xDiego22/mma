<?php 
	 
	use modelo\reporte_atleta;
	
      
	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new reporte_atleta(); 
		
		if(isset($_POST['generar_reporte_atleta'])){

			$objeto->set_club_reporte_atleta($_POST['club_reporte_atleta']);

			$objeto->set_cedula_reporte_atleta($_POST['cedula_reporte_atleta']);

			$objeto->set_nombres_reporte_atleta($_POST['nombres_reporte_atleta']);

			$objeto->set_apellidos_reporte_atleta($_POST['apellidos_reporte_atleta']);

			$objeto->set_fecha_reporte_atleta($_POST['fecha_reporte_atleta']);

			$objeto->set_sexo_reporte_atleta($_POST['sexo_reporte_atleta']);

			$objeto->set_deporte_reporte_atleta($_POST['deporte_reporte_atleta']);

			$objeto->set_categoria_reporte_atleta($_POST['categoria_reporte_atleta']);

			$objeto->generarPDF();
			
		}

		$consulta_clubes = $objeto->consulta_clubes();//metodo de mostrar los clubes en el option 

		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>