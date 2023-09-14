<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class perfil extends conexion{
    private $cedula;
    private $contrasena_actual;
    private $contrasena_nueva;

    private $nombre;
    private $correo;

    public function set_cedula_usuario($valor){
		$this->cedula = $valor;
	}

    public function set_contrasena_actual($valor){
		$this->contrasena_actual = $valor;
	}

    public function set_contrasena_nueva($valor){
		$this->contrasena_nueva = $valor;
	}

    public function set_nombre($valor){
		$this->nombre = $valor;
	}
     public function set_correo($valor){
		$this->correo = $valor;
	}

    public function consultarPerfil(){
        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $stmt = $co->prepare("SELECT usuarios.cedula,usuarios.nombre, usuarios.correo from usuarios where usuarios.cedula = :cedula");

            $stmt->bindParam(':cedula',$this->cedula);

            $stmt->execute();

            $resultado= $stmt->fetchAll(PDO::FETCH_BOTH);

            if($resultado){
					
                $envia = array('resultado'=>"encontro");
                $envia += $resultado;
                return json_encode($envia);
            }
            else{
                $envia = array('resultado'=>"noencontro");
                return json_encode($envia);
            }

        }catch(Exception $e) {
			return $e->getMessage();
		}
    }

    public function cambiarContrasena(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($this->validarContrasena()){
			if($this->existe($this->cedula)){
				if($this->compararContrasena()){

                    try{
                        $contrasena_hash = password_hash($this->contrasena_nueva,PASSWORD_DEFAULT,['cost'=>12]);
    
                        $resultado = $co->prepare("UPDATE usuarios set
                            contrasena = :contrasena
                            where cedula = :cedula");
    
                        $resultado->bindParam(':cedula',$this->cedula);
                        $resultado->bindParam(':contrasena',$contrasena_hash);
                        
                        $resultado->execute();

                        $accion= "Ha modificado su contraseña";
                        $modulo = 14;
						parent::registrar_bitacora($this->cedula, $accion, $modulo);
    
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

    public function editarPerfil(){
        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($this->validarEditar()){
            if($this->existe($this->cedula)){
                if(!$this->existeCorreo() || $this->cedula == $this->propietarioCorreo()){
                    
                    try{
                        
                        $resultado = $co->prepare("UPDATE usuarios set
                            nombre = :nombre,
                            correo = :correo
                            
                            where cedula = :cedula");
    
                        $resultado->bindParam(':cedula',$this->cedula);
                        $resultado->bindParam(':nombre',$this->nombre);
                        $resultado->bindParam(':correo',$this->correo);
                       
                        $resultado->execute();
                        
                        //registro de bitacora
                
                        $accion= "Ha modificado sus datos de perfil";
                        $modulo = 14;
                        
                        parent::registrar_bitacora($this->cedula, $accion, $modulo);

                        return "Perfi modificado exitosamente";
		
                    } catch(Exception $e) {
                        return $e->getMessage();
                    }
                    
                }else{
					return "Error: el correo ya pertenece a otro usuario";
				}
	        }else {
                return "Error: usuario no registrado";
            }
        }else{
            return "Error: ingrese datos correctamente";
        }
    }

    private function validarEditar(){
        $this->cedula = trim($this->cedula);
		$this->nombre = trim($this->nombre);
		$this->correo = trim($this->correo);

		if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula)){
			return false;
		}
		else if (!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,25}$/',$this->nombre)){
			return false;
		}
		else if(!preg_match('/^[A-Za-z0-9ñÑüÜ_.@\b-]{6,70}$/',$this->correo)){
			return false;
		}
		else{
			return true;
		}
	
    }

    private function validarContrasena(){
        
		$this->cedula = trim($this->cedula);
		$this->contrasena_actual = trim($this->contrasena_actual);
        $this->contrasena_nueva = trim($this->contrasena_nueva);
		
		if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula)){
			return false;
		}
		else if(!preg_match('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,20}$/',$this->contrasena_actual)){
			return false;
		}
        else if(!preg_match('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,20}$/',$this->contrasena_nueva)){
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

    private function existeCorreo(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$resultado = $co->prepare("SELECT usuarios.correo from usuarios where correo = :correo");

			$resultado->bindParam(':correo',$this->correo);
			$resultado->execute();
			
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){ 
				return true; 
			}
			else{
				return false; 
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

    private function propietarioCorreo(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
 
			$stmt = $co->prepare("SELECT cedula from usuarios where correo = :correo");

			$stmt->bindParam(':correo',$this->correo);

			$stmt->execute();

			$fila = $stmt->fetchAll(PDO::FETCH_BOTH);

			if($fila){ 
				return $fila[0][0]; 
			}
			else{
				return false; 
			}
			
		}catch(Exception $e){
			return false;
		}
	}

    private function compararContrasena(){
        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $resultado = $co->prepare("SELECT  usuarios.contrasena from usuarios where cedula = :cedula");
				
            $resultado->bindParam(':cedula',$this->cedula);
            
            $resultado->execute();
            
            $contrasenaEncontrada = $resultado->fetchAll(PDO::FETCH_BOTH);
            
            //if($contrasenaEncontrada){
                
                if(password_verify($this->contrasena_actual,$contrasenaEncontrada[0][0])){
                    return true;
                }
                else{
                    return false;
                }
                
            // }
            // else{
            //     return false;
            // }
        
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
}
?>