<?php

	require 'vendor/autoload.php';

	$pagina = "inicio_sesion";

	if (!empty($_GET['pagina'])) {
		$pagina = $_GET['pagina'];
	}

	if(is_file("controlador/".$pagina.".php")){
		require_once("controlador/".$pagina.".php");
	}
	else{
		require_once("controlador/error404.php");
	}

?>
