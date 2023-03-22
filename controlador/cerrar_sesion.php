<?php 
	session_start();
	session_destroy();
	header("Location: ?pagina=inicio_sesion");
 ?>