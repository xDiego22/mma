<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class cambiar_contrasena extends conexion{
    private $cedula;
    private $token;
    private $contrasena;

    public function set_cedula($valor){
		$this->cedula = $valor;
	}

    public function set_token($valor){
		$this->token = $valor;
	}

    public function set_contrasena($valor){
		$this->contrasena = $valor;
	}

    public function get_cedula(){
		return $this->cedula;
	}

    public function get_token(){
		return $this->token;
	}

    public function get_contrasena(){
		return $this->contrasena;
	}

    public function cambiarContrasena(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($this->validar()){
			if($this->existe($this->cedula)){
				if($this->comprobarTokenContrasena()){

                    try{
                        $contrasena_hash = password_hash($this->contrasena,PASSWORD_DEFAULT,['cost'=>12]);
    
                        //generacion de token de usuario
                        $token_nuevo = md5(uniqid(mt_rand(),false));
    
                        $resultado = $co->prepare("UPDATE usuarios set
                            contrasena = :contrasena,
                            token = :token,
                            token_contrasena ='',
                            solicitud_contrasena = 0
                            where cedula = :cedula 
                            and token_contrasena = :token_contrasena");
    
                        $resultado->bindParam(':cedula',$this->cedula);
                        $resultado->bindParam(':contrasena',$contrasena_hash);
                        $resultado->bindParam(':token',$token_nuevo);
                        $resultado->bindParam(':token_contrasena',$this->token);
    
                        $resultado->execute();
    
                        return "Se ha modificado la contraseña exitosamente";
    
                    } catch(Exception $e) {
                        return $e->getMessage();
                    }

                }else{
                    return "Error: los datos no coinciden para el usuario";
                }
			}else {
				return "Error: usuario no registrado";
			}
		}else{
			return "Error: ingrese datos correctamente";
		}
	}

    public function comprobarTokenContrasena(){
        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
            if($this->validarToken()){

                $resultado = $co->prepare("SELECT * from usuarios where cedula = :cedula and token_contrasena = :token and solicitud_contrasena = 1 limit 1");
    
                $resultado->bindParam(':cedula',$this->cedula);
                $resultado->bindParam(':token',$this->token);
    
                $resultado->execute();
    
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
    
                if($fila){ 
                    return true; 
                }
                else{
                    return false; 
                }
                
            }else{

            }
		}catch(Exception $e){
			return false;
		}
    }

    public function validar(){
        
		$this->cedula = trim($this->cedula);
        $this->token = trim($this->token);
		$this->contrasena = trim($this->contrasena);
		
		if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula)){
			return false;
		}
        else if(!preg_match('/^[a-f0-9]{32}$/i',$this->token)){
			return false;
		}
		else if(!preg_match('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,20}$/',$this->contrasena)){
			return false;
		}
		else{
			return true;
		}
	}

    public function validarToken(){
		$this->cedula = trim($this->cedula);
        $this->token = trim($this->token);
		
		if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula)){
			return false;
		}
        else if(!preg_match('/^[a-f0-9]{32}$/i',$this->token)){
			return false;
		}
		else{
			return true;
		}
	}
    private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
 
			$resultado = $co->prepare("SELECT * from usuarios where cedula = :cedula");

			$resultado->bindParam(':cedula',$this->cedula);

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

			if($fila){ 
				return true; 
			}
			else{
				return false; 
			}
			
		}catch(Exception $e){
			return false;
		}

	}
}


?>