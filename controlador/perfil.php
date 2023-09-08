<?php 

	if(is_file("vista/".$pagina.".php")){
		if(empty($_SESSION)){
			session_start();
		}
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>