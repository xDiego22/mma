<?php 
    namespace modelo;
    use modelo\conexion as conexion;
    use PDO;
    use Exception;

    class recuperar_contrasena extends conexion{
        private $correo;

        public function set_correo($valor){
		    $this->correo = $valor;
	    }

        public function get_correo(){
		    return $this->correo;
	    }
    }
?>