<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class gestionar_clubes extends conexion{

	//atributos privados
	private $codigo_club;
	private $nombre_club;
	private $telefono_club;
	private $deporte_club;
	private $direccion_club;

	private $permiso;
	
	public function set_codigo_club($valor){
		$this->codigo_club = $valor;
	}

	public function set_nombre_club($valor){
		$this->nombre_club = $valor;
	}

	public function set_telefono_club($valor){
		$this->telefono_club = $valor;
	}

	public function set_deporte_club($valor){
		$this->deporte_club = $valor;
	}

	public function set_direccion_club($valor){
		$this->direccion_club = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}


	//get = leer/obtener

	public function get_codigo_club(){
		return $this->codigo_club;
	}

	public function get_nombre_club(){
		return $this->nombre_club;
	}

	public function get_telefono_club(){
		return $this->telefono_club;
	}

	public function get_deporte_club(){
		return $this->deporte_club;
	}

	public function get_direccion_club(){
		return $this->direccion_club;
	}

	function get_permiso(){
		return $this->permiso;
	}


	//metodos
	public function registrar($rol_usuario,$cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[1]=="true"){
		
			if($this->validar()){
				if(!$this->existe($this->codigo_club)){

				$co = $this->conecta();
				$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				try{
					
					$resultado = $co->prepare("INSERT into clubes(
						codigo,
						nombre,
						telefono,
						deportebase,
						direccion)
						Values(
						:codigo_club,
						:nombre_club,
						:telefono_club,
						:deporte_club,
						:direccion_club)");

					//SE ENCRIPTA LA INFORMACION
					$this->telefono_club = parent::encriptar($this->telefono_club);
					$this->deporte_club = parent::encriptar($this->deporte_club);
					$this->direccion_club = parent::encriptar($this->direccion_club);
				
					$resultado->bindParam(':codigo_club',$this->codigo_club);
					$resultado->bindParam(':nombre_club',$this->nombre_club);
					$resultado->bindParam(':telefono_club',$this->telefono_club);
					$resultado->bindParam(':deporte_club',$this->deporte_club);
					$resultado->bindParam(':direccion_club',$this->direccion_club);

					$resultado->execute();
					
					$accion= "Ha regitrado un nuevo Club";

					parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
					
					return "Registrado Correctamente";
					
					}catch(Exception $e){
						return $e->getMessage();
					}
				} 
				else {
					return "ya existe club con el codigo que desea ingresar";
				}
			}else{
				return "ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para registrar";
		}
	}

	public function modificar($rol_usuario,$cedula_bitacora,$modulo){

		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[2]=="true"){
		
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($this->validar()){
				if($this->existe($this->codigo_club)){

					try{

						$resultado = $co->prepare("UPDATE clubes set
							codigo = :codigo_club,
							nombre = :nombre_club,
							telefono = :telefono_club,
							deportebase = :deporte_club,
							direccion = :direccion_club
							where codigo = :codigo_club");

						//SE ENCRIPTA LA INFORMACION
						$this->telefono_club = parent::encriptar($this->telefono_club);
						$this->deporte_club = parent::encriptar($this->deporte_club);
						$this->direccion_club = parent::encriptar($this->direccion_club);

						$resultado->bindParam(':codigo_club',$this->codigo_club);
						$resultado->bindParam(':nombre_club',$this->nombre_club);
						$resultado->bindParam(':telefono_club',$this->telefono_club);
						$resultado->bindParam(':deporte_club',$this->deporte_club);
						$resultado->bindParam(':direccion_club',$this->direccion_club);

						$resultado->execute();			
							
						$accion= "Ha modificado un Club";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
						return "Modificado Correctamente";

					} catch(Exception $e) {
						return $e->getMessage();
					}
				}
				else {
					return "club no registrado";
				}
			}else{
				return "ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para modificar";
		}
	}
 
	public function eliminar($cedula_bitacora,$modulo,$rol_usuario){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[3]=="true"){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if(preg_match_all('/^[A-Za-z0-9\b]{3,30}$/',$this->codigo_club)){
			
				if($this->existe($this->codigo_club)){

					try{

						$resultado = $co->prepare("DELETE from clubes where codigo = :codigo_club");

						$resultado->bindParam(':codigo_club',$this->codigo_club);

						$resultado->execute();		

						if ($resultado) {
							$accion= "Ha eliminado un Club";

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
					return "Club no registrado";
				}
			}
			else{
				return "ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para eliminar";
		}
	}

	public function consultar($rol_usuario,$cedula_bitacora,$modulo){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

		try{

			$valor = $this->permisos($rol_usuario); //rol del usuario
			$datos = array();
			if ($valor[0]=="true") {

				$stmt = $co->prepare("SELECT * from clubes");
				$stmt->execute();
				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				$opciones="";
	
				if ($valor[2]=="true") {
					$opciones = $opciones."<button type='button' class='btn btn-primary mb-1 mr-1' data-toggle='modal' data-target='#modal_gestion' onclick='modalmodificar(this)' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>";
				}
				if ($valor[3]=="true"){
					$opciones = $opciones."<button type='button' class='btn btn-danger mb-1 ' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
				}

				foreach($resultado as $fila){
					$subarray=array();
					$subarray['codigo'] = $fila['codigo'];
					$subarray['nombre'] = $fila['nombre'];
					$subarray['telefono'] = parent::desencriptar($fila['telefono']);
					$subarray['deportebase'] = parent::desencriptar($fila['deportebase']);
					$subarray['direccion'] = parent::desencriptar($fila['direccion']);
					$subarray['opciones'] = $opciones;

					$datos[] = $subarray;
				}
				$json = array(
					"data" => $datos
				);
				
				$accion= "Ha consultado la tabla de Clubes";
				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
	
				return json_encode($json);
			} else{
				return 'No tiene permiso de realizar esta accion';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}
	}

	private function existe($codigo_club){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		try {

			//se asigna a $resultado la consulta prepare para conocer si existe el registro
			$resultado = $co->prepare("SELECT * from clubes where codigo = :codigo_club");

			$resultado->bindParam(':codigo_club',$codigo_club);

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ //si $fila, significa que encontro el codigo del club

				return true; //retorna verdadero
			    
			}
			else{
				
				return false; //retorna falso en caso de que no consiga el codigo del club
			}
			
		}catch(Exception $e){
			
			return false;
		}

	}

	public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all("/^[0-9]{1,10}$/",$rol)){
			try{
				$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '1' ");
				
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
		}else {
			return false;
		}
	}

	public function validar(){

        $this->codigo_club = trim($this->codigo_club);
        $this->telefono_club = trim($this->telefono_club);
        $this->deporte_club = trim($this->deporte_club);
        
		$this->nombre_club = trim($this->nombre_club);
		$this->direccion_club = trim($this->direccion_club);

		if(!preg_match_all('/^[A-Za-z0-9\b]{3,10}$/',$this->codigo_club)){
			return false;
		}
		else if(!preg_match_all('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{5,30}$/',$this->nombre_club)){
			return false;
		}
		else if (!preg_match_all('/^[0-9\b]{11}$/',$this->telefono_club)){
			return false;
		}
		else if (!preg_match_all('/^[a-zA-Z\b]{1,10}$/',$this->deporte_club)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ0-9,.# -]{3,30}$/',$this->direccion_club)){
			return false;
		}
		else{
			return true;
		}
	}

 
}

?>