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

		if($this->validar()){
			if(!$this->existe($this->cedula_usuarios)){
				$co = $this->conecta();
				$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//se añaden atributos a la conexión para poder controlar los errores
				//atributos para poder manejar los posibles errores
				try{
					$contrasena_hash = password_hash($this->contrasena_usuarios,PASSWORD_DEFAULT,['cost'=>12]);
					$resultado = $co->prepare("INSERT into usuarios(
						cedula,
						nombre,
						contrasena,
						id_rol)
						Values(
						:cedula_usuarios,
						:nombre_usuarios,
						:contrasena_usuarios,
						:rol_usuario)");

					$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);
					$resultado->bindParam(':nombre_usuarios',$this->nombre_usuarios);
					$resultado->bindParam(':contrasena_usuarios',$contrasena_hash);
					$resultado->bindParam(':rol_usuario',$this->rol_usuario);

					$resultado->execute();
					
					$accion= "Ha regitrado un nuevo Usuario";

					parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

					return  $this->consultar($rol_usuario,$cedula_bitacora,$modulo);
				}catch(Exception $e){
					return $e->getMessage();
				}
			} 
			else {
				return "Ya existe usuario con la cedula que desea ingresar";
			}
		}else{
			return "ingrese datos correctamente";
		}
		
	}

	public function modificar($rol_usuario, $cedula_bitacora,$modulo){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($this->validar()){
			if($this->existe($this->cedula_usuarios)){

				try{
					$contrasena_hash = password_hash($this->contrasena_usuarios,PASSWORD_DEFAULT,['cost'=>12]);
					$resultado = $co->prepare("UPDATE usuarios set
						cedula = :cedula_usuarios,
						nombre = :nombre_usuarios,
						contrasena = :contrasena_usuarios,
						id_rol = :rol_usuario
						where cedula = :cedula_usuarios");

					$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);
					$resultado->bindParam(':nombre_usuarios',$this->nombre_usuarios);
					$resultado->bindParam(':contrasena_usuarios',$contrasena_hash);
					$resultado->bindParam(':rol_usuario',$this->rol_usuario);

					$resultado->execute();
					
					//registro de bitacora
			
					$accion= "Ha modificado un Usuario";
					
					parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

					return  $this->consultar($rol_usuario, $cedula_bitacora,$modulo);

				} catch(Exception $e) {
					return $e->getMessage();
				}
			}
			else {
				return "Usuario no registrado";
			}
		}else{
			return "ingrese datos correctamente";
		}
	}

	public function eliminar($cedula_bitacora,$modulo){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_usuarios)){
			if($this->existe($this->cedula_usuarios)){

				try{

					$resultado = $co->prepare("Delete from usuarios where cedula = :cedula_usuarios");

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
				return "Usuario no registrado";
			}
		}else{
			return "ingrese datos correctamente";
		}	
		
	}
 
	public function consultar($rol_usuario, $cedula_bitacora,$modulo){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT usuarios.cedula, usuarios.contrasena, roles.nombre, roles.id, usuarios.nombre from usuarios, roles where usuarios.id_rol = roles.id");

			$resultado->execute();

			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					//se le coloca $r para no confundirse, sigue siendo el mismo $resultado solo que con otro nombre
					$valor = $this->permisos($rol_usuario);//rol del usuario
					if ($valor[0]=="true") {
					$respuesta = $respuesta."<tr>";//colocarlinea se hace desde js
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r[0];//cedula
						$respuesta = $respuesta."</td>";

						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r[4];//nombre
						$respuesta = $respuesta."</td>";

						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r[1];//contraseña
						$respuesta = $respuesta."</td>";

						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r[1];//contraseña
						$respuesta = $respuesta."</td>";

						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r[2];//rol
						$respuesta = $respuesta."</td>";

						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r[3];//id de rol
						$respuesta = $respuesta."</td>";
 
						$respuesta = $respuesta."<td>";
							if ($valor[2]=="true") {
							$respuesta = $respuesta."<button type='button' class='btn btn-primary mb-1 mr-1' data-toggle='modal' data-target='#modal_gestion' onclick='modalmodificar(this)' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>";
							}if ($valor[3]=="true"){
							$respuesta = $respuesta."<button type='button' class='btn btn-danger mb-1 mr-1' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
							}
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
					}
					
				}

				$accion= "Ha consultado la tabla Usuarios";
				
				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
				return $respuesta;
			}
			else {
				return '';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}
	}

	private function existe($cedula_usuarios){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//se hace un try esto hace que en caso de error el programa continue por cath
		try {
 
			//se asigna a $resultado la consulta prepare para conocer si existe el registro
			$resultado = $co->prepare("Select * from usuarios where cedula = :cedula_usuarios");

			$resultado->bindParam(':cedula_usuarios',$this->cedula_usuarios);

			$resultado->execute();

			//se combierte el resultado en un arreglo asociativo 
			//y se asigna a la variable $fila
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ //si $fila, significa que encontro la cedula

				return true; //retorna verdadero
			    
			}
			else{
				
				return false; //retorna falso en caso de que no consiga la cedula
			}
			
		}catch(Exception $e){
			//si estra aca es que hubo algun error por lo que tambien me retornara que
			//no la encontro
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
	}

	public function validar(){
		$this->nombre_usuarios = trim($this->nombre_usuarios);
		if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_usuarios)){
			return false;
		}
		else if (!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,25}$/',$this->nombre_usuarios)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->rol_usuario)){
			return false;
		}
		else if(!preg_match('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,70}$/',$this->contrasena_usuarios)){
			return false;
		}
		else{
			return true;
		}
	}

}

?>