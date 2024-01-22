<?php  

namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
class gestionar_usuarios extends conexion{
 
	//atributos privados
	private $cedula_usuarios;
	private $nombre_usuarios;
	private $contrasena_usuarios;
	private $correo_usuarios;
	private $rol_usuario;

	private $permiso;

	
	public function set_cedula_usuarios($valor){
		$this->cedula_usuarios = $valor;
	}

	public function set_nombre_usuarios($valor){
		$this->nombre_usuarios = $valor;
	}

	public function set_contrasena_usuarios($valor){
		$this->contrasena_usuarios = $valor;
	}

	public function set_correo_usuarios($valor){
		$this->correo_usuarios = $valor;
	}

	public function set_rol_usuario($valor){
		$this->rol_usuario = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}
	

	public function get_cedula_usuarios(){
		return $this->cedula_usuarios;
	}

	public function get_nombre_usuarios(){
		return $this->nombre_usuarios;
	}

	public function get_contrasena_usuarios(){
		return $this->contrasena_usuarios;
	}

	public function get_correo_usuario(){
		return $this->correo_usuario;
	}

	public function get_rol_usuario(){
		return $this->rol_usuario;
	}

	function get_permiso(){
		return $this->permiso;
	}

	function get_cedula_bitacora(){
		return $this->cedula_bitacora; 
	}

	function get_modulo(){
		return $this->modulo; 
	}

	
	//metodos
	public function registrar($rol_usuario, $cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario);//rol del usuario
		if ($valor[1]=="true") {
			if($this->validar()){
				if(!$this->existe($this->cedula_usuarios)){
					if(!$this->existeCorreo()){
						$co = $this->conecta();
						$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						try{
							$contrasena_hash = password_hash($this->contrasena_usuarios,PASSWORD_DEFAULT,['cost'=>12]);
							
							//generacion de token de usuario
							$token = md5(uniqid(mt_rand(),false));

							$resultado = $co->prepare("INSERT into usuarios(
								cedula,
								nombre,
								contrasena,
								id_rol,
								correo,
								token)
								Values(
								:cedula_usuarios,
								:nombre_usuarios,
								:contrasena_usuarios,
								:rol_usuario,
								:correo_usuarios,
								:token)");

							$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);
							$resultado->bindParam(':nombre_usuarios',$this->nombre_usuarios);
							$resultado->bindParam(':contrasena_usuarios',$contrasena_hash);
							$resultado->bindParam(':rol_usuario',$this->rol_usuario);
							$resultado->bindParam(':correo_usuarios',$this->correo_usuarios);
							$resultado->bindParam(':token',$token);

							$resultado->execute();
							
							$accion= "Ha regitrado un nuevo Usuario";

							parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

							return "Registrado Correctamente";
						}catch(Exception $e){
							return $e->getMessage();
						}
					} else{ 
						return "Error: el correo ya pertenece a otro usuario";
					}
					
				} 
				else {
					return "Error: ya existe usuario con la cedula que desea ingresar";
				}
			}else{
				return "Error: ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para registrar";
		}
	}

	public function modificar($rol_usuario, $cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario);//rol del usuario
		if ($valor[2]=="true") {

			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if($this->validar()){
				if($this->existe($this->cedula_usuarios)){
					if(!$this->existeCorreo() || $this->cedula_usuarios == $this->propietarioCorreo()){
						
						try{
							$contrasena_hash = password_hash($this->contrasena_usuarios,PASSWORD_DEFAULT,['cost'=>12]);
		
							//generacion de token de usuario
							$token = md5(uniqid(mt_rand(),false));
		
							$resultado = $co->prepare("UPDATE usuarios set
								cedula = :cedula_usuarios,
								nombre = :nombre_usuarios,
								contrasena = :contrasena_usuarios,
								id_rol = :rol_usuario,
								correo = :correo_usuarios,
								token = :token
								where cedula = :cedula_usuarios");
		
							$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);
							$resultado->bindParam(':nombre_usuarios',$this->nombre_usuarios);
							$resultado->bindParam(':contrasena_usuarios',$contrasena_hash);
							$resultado->bindParam(':rol_usuario',$this->rol_usuario);
							$resultado->bindParam(':correo_usuarios',$this->correo_usuarios);
							$resultado->bindParam(':token',$token);
							$resultado->execute();
							
							//registro de bitacora
					
							$accion= "Ha modificado un Usuario";
							
							parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
		
							return "Modificado Correctamente";
		
						} catch(Exception $e) {
							return $e->getMessage();
						}
					}else{
						return "Error: el correo ya pertenece a otro usuario";
					}
				}
				else {
					return "Error: usuario no registrado";
				}
			}else{
				return "Error: ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para modificar";
		}
	}

	public function eliminar($cedula_bitacora,$modulo,$rol_usuario){
		$valor = $this->permisos($rol_usuario);//rol del usuario
		if ($valor[3]=="true") {
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if(preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_usuarios)){
				if($this->cedula_usuarios != '29831184'){

					if($this->existe($this->cedula_usuarios)){
	
						try{
	
							$resultado = $co->prepare("DELETE from usuarios where cedula = :cedula_usuarios");
	
							$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);
	
							$resultado->execute();
	
							
							
							if ($resultado) {
								$accion= "Ha eliminado un Usuario";
							
								parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
								return "eliminado";
							}
							else{
								return "no eliminado";
							}
	
						}catch(Exception $e) {
							return $e->getMessage();
						}
					}
					else {
						http_response_code(400);
						return "Error: usuario no registrado";
					}
				}else{
					http_response_code(500);
					return "Error: este usuario no puede ser eliminado";
				}
			}else{
				http_response_code(400);
				return "Error: ingrese datos correctamente";
			}	
		}else {
			http_response_code(403);
			return "no tiene permiso para eliminar";
		}
	}
 
	public function consultar($rol_usuario, $cedula_bitacora,$modulo){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$valor = $this->permisos($rol_usuario); //rol del usuario
			$datos = array();
			if ($valor[0]=="true") {

				$stmt = $co->prepare("SELECT usuarios.cedula, usuarios.contrasena, roles.nombre, roles.id, usuarios.nombre, usuarios.correo from usuarios, roles where usuarios.id_rol = roles.id");

				$stmt->execute();
				
				$resultado = $stmt->fetchAll(PDO::FETCH_NUM);
				
				$opciones="";
	
				if ($valor[2]=="true") {
					$opciones = $opciones."<button type='button' class='btn btn-primary mb-1 mr-1' data-toggle='modal' data-target='#modal_gestion' onclick='modalmodificar(this)' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>";
				}
				if ($valor[3]=="true"){
					$opciones = $opciones."<button type='button' class='btn btn-danger mb-1 ' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
				}

				foreach($resultado as $fila){
	
					$subarray=array();
					$subarray['cedula']=$fila[0];
					$subarray['nombre']=$fila[4];
					$subarray['correo']=$fila[5];
					$subarray['contrasena']=$fila[1];
					$subarray['rol']=$fila[2];
					$subarray['id_rol']=$fila[3];
					$subarray['opciones']=$opciones;

					$datos[] = $subarray;
				}
				$json = array(
					"data" => $datos
				);
				
				$accion= "Ha consultado la tabla Usuarios";
				
				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
	
				return json_encode($json);
			} else {
				return 'No tiene permiso de realizar esta accion';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}
	}

	private function existe($cedula_usuarios){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
 
			$resultado = $co->prepare("SELECT * from usuarios where cedula = :cedula_usuarios");

			$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);

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

	public function consulta_roles(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT * from roles");

			$resultado->execute();

			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id']. 
					">".$r['nombre']."</option>";
				}
				return $respuesta;
			}
			else {
				return '';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}
	}

	public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all("/^[0-9]{1,10}$/",$rol)){
			try{
				
				
				$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '7' ");
				
				$resultado->bindParam(':rol',$rol);
				$resultado->execute();
				
				$consultar="";
				$registrar="";
				$modificar="";
				$eliminar="";
				
				foreach($resultado as $r){
					$consultar = $r['consultar'];
					$registrar = $r['registrar'];
					$modificar = $r['modificar'];
					$eliminar = $r['eliminar'];
				}
				
				$respuesta_permiso=[];
				
				$respuesta_permiso[0]=$consultar;
				$respuesta_permiso[1]=$registrar;
				$respuesta_permiso[2]=$modificar;
				$respuesta_permiso[3]=$eliminar;	
				
				if(!empty($respuesta_permiso)){
				
					return $respuesta_permiso;

				}else{
					return "ha ocurrido un error";
				}
				
			}catch(Exception $e){
				
				return false;
			}
		} else {
			return false;
		}
	}

	public function validar(){
		$this->cedula_usuarios = trim($this->cedula_usuarios);
		$this->nombre_usuarios = trim($this->nombre_usuarios);
		$this->rol_usuario = trim($this->rol_usuario);
		$this->contrasena_usuarios = trim($this->contrasena_usuarios);
		$this->correo_usuarios = trim($this->correo_usuarios);
		
		if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_usuarios)){
			return false;
		}
		else if (!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,25}$/',$this->nombre_usuarios)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->rol_usuario)){
			return false;
		}
		else if(!preg_match('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,20}$/',$this->contrasena_usuarios)){
			return false;
		}
		else if(!preg_match('/^[A-Za-z0-9ñÑüÜ_.@\b-]{6,70}$/',$this->correo_usuarios)){
			return false;
		}
		else{
			return true;
		}
	}

	private function existeCorreo(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$resultado = $co->prepare("SELECT usuarios.correo from usuarios where correo = :correo");

			$resultado->bindParam(':correo',$this->correo_usuarios);
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

			$stmt->bindParam(':correo',$this->correo_usuarios);

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

}

?>