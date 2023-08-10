<?php 
    use modelo\recuperar_contrasena;

    if(is_file("vista/".$pagina.".php")){
 
		$objeto = new recuperar_contrasena();

		if(isset($_POST['accion_recuperar'])){
            
            $objeto->set_correo($_POST['correo_recuperar']);
            
			exit;
		}
		
		require_once("vista/".$pagina.".php");
	} 
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>