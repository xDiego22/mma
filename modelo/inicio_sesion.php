<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use flight;

class inicio_sesion extends conexion{
  
	private $cedula_inicio;
	private $contrasena_inicio;
	private $fila_cedula;
	private $rol;
 
	public function set_cedula_inicio($valor){
		$this->cedula_inicio = $valor;
	}

	public function set_contrasena_inicio($valor){
		$this->contrasena_inicio = $valor;
	}

	public function set_rol($valor){
		$this->rol = $valor;
	}

	public function get_cedula_inicio(){
		return $this->cedula_inicio;
	}
	
	public function get_contrasena_inicio(){
		return $this->contrasena_inicio;
	}

	public function get_rol(){
		return $this->rol;
	}


	//metodos  

	public function busca_cedula(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
			 
			$resultado = $co->prepare("SELECT usuarios.cedula from usuarios where cedula = :cedula_inicio");
			 
			$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
			
			$resultado->execute();
			 
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){
				$this->fila_cedula=$fila[0][0];
				return $fila[0][0];
			}
			else{
				
				return "";
			}
			
			}catch(Exception $e){
			return $e->getMessage();
			}
		}else{
			return "ingrese cedula correctamente";
		}
	}

	/*metodo nuevo*/
	public function busca_nombre(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
				
				$resultado = $co->prepare("SELECT  usuarios.nombre from usuarios where cedula = :cedula_inicio");
				
				$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
				
				$resultado->execute();
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				if($fila){
					return $fila[0][0];
				}
				else{
					
					return "Error en datos ingresados";
				}
				
			}catch(Exception $e){
				return $e->getMessage();
			}
		}else{
			return "ingrese cedula correctamente";
		}
	}


	public function busca_contrasena(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
				
				$resultado = $co->prepare("SELECT  usuarios.contrasena from usuarios where cedula = :cedula_inicio");
				
				$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
				
				$resultado->execute();
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				if($fila){
					return $fila[0][0];
				}
				else{
					
					return "Error en datos ingresados";
				}
				
			}catch(Exception $e){
				return $e->getMessage();
			}

		}else{
			return "ingrese cedula correctamente";
		}
	}

	public function busca_id_rol(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){	
			try{
				
				$resultado = $co->prepare("SELECT usuarios.id_rol from usuarios where usuarios.cedula = :cedula_inicio");
				
				$resultado->bindParam(':cedula_inicio',$this->fila_cedula);
				
				$resultado->execute();
				
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				if($fila){
					
					return $fila[0][0];
				
				}
				else{
					return "";
				}
				
			}catch(Exception $e){
				return $e->getMessage();
			}
		}else{
			return "ingrese cedula correctamente";
		}
	}

	public function busca_modulo(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->prepare("SELECT intermediaria.id_modulos from intermediaria where intermediaria.id_rol = :rol");
			
			$resultado->bindParam(':rol',$this->rol);
			
			$resultado->execute();
			
			
			$respuesta_modulo=[];
			$i=0;

			foreach($resultado as $r){

				$respuesta_modulo[$i] = $r['id_modulos'];
				
				$i++;
			}
			
			if(!empty($respuesta_modulo)){
			
				return $respuesta_modulo;

			}else{
				return "";
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function buscaSolicitud(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
				
				$resultado = $co->prepare("SELECT  usuarios.solicitud_contrasena from usuarios where cedula = :cedula_inicio and solicitud_contrasena = 1 limit 1");
				
				$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
				
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
		}else{
			return "ingrese cedula correctamente";
		}
	}

	public function solicitarCambioContrasena(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			$resultado = $co->prepare("UPDATE usuarios set
				solicitud_contrasena = 1
				where cedula = :cedula_inicio");
    
			$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
			$resultado->execute();
			return true;
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}

	public function authentication(){
		try {
			$db = $this->conecta();
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$datos = $this->decryptApp(Flight::request()->data->data);
	
			$cedula = $datos['cedula'];
			$contrasena = $datos['contrasena'];
	
			if(preg_match_all('/^[0-9]{7,8}$/',$cedula)){
				if(preg_match_all('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,70}$/',$contrasena)){
					
					$query = $db->prepare('SELECT * from usuarios where cedula = :cedula');
				
					if($query->execute([':cedula' => $cedula])){
						$usuario = $query->fetch();
						if ($usuario['cedula']){
				
							if(password_verify($contrasena, $usuario['contrasena'])){
				
								$key = $_ENV['JWT_SECRET_KEY'];
					
								$payload = [
									'iat' => time(), //tiempo de emision del token
									'exp' => time() + 3600,//tiempo de expiracion del token (1 hora)
									'data' => $usuario['cedula']
								];
	
								$jwt = JWT::encode($payload, $key, 'HS256');
	
								$array = [
									
									'token' => $this->encryptApp($jwt),
									'data' =>$this->encryptApp([
										'exp' => time() + 3600,
										'status' => 'success',
										'cedula' => $usuario['cedula'],
										'nombre' => $usuario['nombre'],
										'correo' => $usuario['correo'],
										'rol' => $usuario['id_rol']
									])
								];
							}else{
								$array = [
									'data'=>$this->encryptApp([
	
										'error' => 'Datos incorrectos , intente de nuevo',
										'status' => 'error'
									])
								];
							}
						}
						else {
							$array = [
								'data' =>$this->encryptApp([
									'error' => 'Usuario no existe , intente de nuevo',
									'status' => 'error'
								])
							];
						}
					}else {
						$array = [
							'data' =>[
								'error' => 'error de query, intente de nuevo',
								'status' => 'error'
							]
						];
					}
				}
				else{
					$array = [
	
						'data' => $this->encryptApp([
							'error' => 'Error en contraseña, intente de nuevo',
							'status' => 'error'
						])
					];
				}
			}else{
				$array = [
					'data' => $this->encryptApp([
						'status' => 'error',
						'error' => 'Error en cedula, intente de nuevo',
					])
				];
			}
			Flight::json($array);

		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	private function decryptApp($mensajeEncriptado){
		$privateKey = file_get_contents($_ENV['PATH_PRIVATE_KEY_APP']);

		openssl_private_decrypt(base64_decode($mensajeEncriptado), $dataDesencriptado, $privateKey);

		return json_decode($dataDesencriptado,true);
	}

	private function encryptApp($mensaje){
		$publicKey = openssl_pkey_get_public(file_get_contents($_ENV['PATH_PUBLIC_KEY_APP']));
		openssl_public_encrypt(json_encode($mensaje),$encriptado,$publicKey);
		return base64_encode($encriptado);
	}

}

?>