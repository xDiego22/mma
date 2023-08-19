<?php

	require 'vendor/autoload.php';

	$pagina = "inicio_sesion";

	if (!empty($_GET['pagina'])) {
		$pagina = $_GET['pagina'];
	}

	if(is_file("controlador/".$pagina.".php")){
		
		if(empty($_SESSION) and $pagina != 'inicio_sesion'){
			session_start();
		}
		if(!isset($_SESSION['cedula']) || $_SESSION['cedula'] == "" and $pagina != 'inicio_sesion' and $pagina != 'error404' and $pagina != 'cambiar_contrasena' and $pagina != 'recuperar_contrasena'){
			
			require_once("controlador/cerrar_sesion.php");
			exit;
		}

		require_once("controlador/".$pagina.".php");
	}
	else{
		require_once("controlador/error404.php");
	}

?>
