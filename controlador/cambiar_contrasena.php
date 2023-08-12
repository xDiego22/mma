<?php 
if(is_file("vista/".$pagina.".php")){

    if(empty($_GET['cedula'])){
        header('Location: .');
    }
    if(empty($_GET['token'])){
        header('Location: .');
    }

    $cedula = $_GET['cedula'];
    $token = $_GET['token'];
    
    require_once("vista/".$pagina.".php");

}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>