<?php 
    use modelo\cambiar_contrasena;
    
    if(is_file("vista/".$pagina.".php")){

        $objeto = new cambiar_contrasena();

        if(empty($_GET['cedula'])){
            header('Location: .');
        }
        if(empty($_GET['token'])){
            header('Location: .');
        }
      
        $objeto->set_cedula($_GET['cedula']);
        $objeto->set_token($_GET['token']);

        $comprobar = $objeto->comprobarTokenContrasena();

        //comprueba de que el usuarios si solicito restaurar contrasena
        if(!$comprobar){
            echo "Error: No se pudo verificar los datos";
            exit;
        }

        if(isset($_POST['accion'])){	

            $accion = $_POST['accion'];

            $objeto->set_cedula($_POST['cedula']);
            $objeto->set_token($_POST['token']);
            $objeto->set_contrasena($_POST['contrasena']);

            if($accion == "cambiar"){
                
                echo $objeto->cambiarContrasena();
            }

            exit();

        }
        require_once("vista/".$pagina.".php");

    }else{
        echo "PAGINA EN CONSTRUCCION";
    }
?>