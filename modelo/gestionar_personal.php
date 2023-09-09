<?php  

namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class gestionar_personal extends conexion{

	//atributos privados
	private $club_personal;
	private $cedula_personal;
	private $nombres_personal;
	private $apellidos_personal;
	private $telefono_personal;
	private $cargo_personal;
	private $direccion_personal;

	private $permiso;

	public function set_club_personal($valor){
		$this->club_personal = $valor;
	}

	public function set_cedula_personal($valor){
		$this->cedula_personal = $valor;
	}

	public function set_nombres_personal($valor){
		$this->nombres_personal = $valor;
	}

	public function set_apellidos_personal($valor){
		$this->apellidos_personal = $valor;
	}

	public function set_telefono_personal($valor){
		$this->telefono_personal = $valor;
	}

	public function set_cargo_personal($valor){
		$this->cargo_personal = $valor;
	}

	public function set_direccion_personal($valor){
		$this->direccion_personal = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}

	//get = leer/escribir

	public function get_club_personal(){
		return $this->club_personal;
	}

	public function get_cedula_personal(){
		return $this->cedula_personal;
	}

	public function get_nombres_personal(){
		return $this->nombres_personal;
	}

	public function get_apellidos_personal(){
		return $this->apellidos_personal;
	}

	public function get_telefono_personal(){
		return $this->telefono_personal;
	}

	public function get_cargo_personal(){
		return $this->cargo_personal;
	}

	public function get_direccion_personal(){
		return $this->direccion_personal;
	}

	function get_permiso(){
		return $this->permiso;
	}

	//metodos 

	public function registrar($rol_usuario, $cedula_bitacora,$modulo){

		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[1]=="true"){
			if($this->validar()){
				if(!$this->existe($this->cedula_personal)){

					
					$co = $this->conecta();
					$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//se añaden atributos a la conección para poder controlar los errores
					//atributos para poder manejar los posibles errores


					try{

						$resultado = $co->prepare("INSERT into personal(
							id_club,
							cedula,
							nombre,
							apellido,
							telefono,
							cargo,
							direccion)
							Values(
							:club_personal,
							:cedula_personal,
							:nombres_personal,
							:apellidos_personal,
							:telefono_personal,
							:cargo_personal,
							:direccion_personal)");
						
						//SE ENCRIPTA LA INFORMACION
						$this->direccion_personal = parent::encriptar($this->direccion_personal);

						$resultado->bindParam(':club_personal',$this->club_personal);
						$resultado->bindParam(':cedula_personal',$this->cedula_personal);
						$resultado->bindParam(':nombres_personal',$this->nombres_personal);
						$resultado->bindParam(':apellidos_personal',$this->apellidos_personal);
						$resultado->bindParam(':telefono_personal',$this->telefono_personal);
						$resultado->bindParam(':cargo_personal',$this->cargo_personal);
						$resultado->bindParam(':direccion_personal',$this->direccion_personal);
		
						$resultado->execute();

						$accion= "Ha regitrado un nuevo Personal de club";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

						return  $this->consultar($rol_usuario, $cedula_bitacora,$modulo);

					}catch(Exception $e){
						return $e->getMessage();
					}

				}
				else{
					return "Ya existe un Personal con esta cedula";
				}
			}else{
				return "ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para registrar";
		}
	}

	public function modificar($rol_usuario, $cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[2]=="true"){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if($this->validar()){
				if($this->existe($this->cedula_personal)){
		
					try{

						$resultado = $co->prepare("Update personal set
							id_club = :club_personal,
							cedula = :cedula_personal,
							nombre = :nombres_personal,
							apellido = :apellidos_personal,
							telefono = :telefono_personal,
							cargo = :cargo_personal,
							direccion = :direccion_personal
							where cedula = :cedula_personal");
						
						//SE ENCRIPTA LA INFORMACION
						$this->direccion_personal = parent::encriptar($this->direccion_personal);

						$resultado->bindParam(':club_personal',$this->club_personal);
						$resultado->bindParam(':cedula_personal',$this->cedula_personal);
						$resultado->bindParam(':nombres_personal',$this->nombres_personal);
						$resultado->bindParam(':apellidos_personal',$this->apellidos_personal);
						$resultado->bindParam(':telefono_personal',$this->telefono_personal);
						$resultado->bindParam(':cargo_personal',$this->cargo_personal);
						$resultado->bindParam(':direccion_personal',$this->direccion_personal);

						$resultado->execute();	

						$accion= "Ha modificado un Personal de club";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
							
						return $this->consultar($rol_usuario, $cedula_bitacora,$modulo);
						
					} catch(Exception $e) {
						return $e->getMessage();
					}
				}
				else {
					return "Personal no registrado";
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

			if(preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_personal)){
				if($this->existe($this->cedula_personal)){

					try{

						$resultado = $co->prepare("Delete from personal where cedula = :cedula_personal");

						$resultado->bindParam(':cedula_personal',$this->cedula_personal);

						$resultado->execute();	

						if ($resultado) {
							$accion= "Ha eliminado un Personal de un club";

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
					return "Personal no registrado";
				}
			}else{
				return "ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para eliminar";
		}
	}

	public function consultar($rol_usuario, $cedula_bitacora,$modulo){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT a.cedula, CONCAT(a.nombre,' ',a.apellido),
				a.telefono, a.cargo, a.direccion, b.id,
				b.nombre, a.nombre , a.apellido from personal as a, clubes as b 
				where a.id_club = b.id");
			$resultado->execute();
			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa para recorrer los resultados de las consultas
				
				foreach($resultado as $r){
					$valor = $this->permisos($rol_usuario); //rol del usuario

					if ($valor[0]=="true") {
						$respuesta = $respuesta."<tr>";
							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[6];
							$respuesta = $respuesta."</td>";
							
							$respuesta = $respuesta."<td style='display:none'>";
								$respuesta = $respuesta.$r[5];
							$respuesta = $respuesta."</td>";
							
							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[0];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[1];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[2];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[3];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.parent::desencriptar($r[4]);
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td class='d-flex'>";
								if ($valor[2]=="true") {
									$respuesta = $respuesta."<button type='button' class='btn btn-primary mb-1 mr-1' data-toggle='modal' data-target='#modal_gestion' onclick='modalmodificar(this)' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>";
								}
								if ($valor[3]=="true"){
									$respuesta = $respuesta."<button type='button' class='btn btn-danger mb-1 ' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
								}
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td style='display:none'>";
								$respuesta = $respuesta.$r[7];
							$respuesta = $respuesta."</td>";
							
							$respuesta = $respuesta."<td style='display:none'>";
								$respuesta = $respuesta.$r[8];
							$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."</tr>";
					}
				}

				$accion= "Ha consultado la tabla de Personal";

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

	private function existe($cedula_personal){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//se hace un try esto hace que en caso de error el programa continue por cath
		try {

			//se asigna a $resultado la consulta prepare para conocer si existe el registro
			$resultado = $co->prepare("SELECT * from personal where cedula = :cedula_personal");

			$resultado->bindParam(':cedula_personal',$cedula_personal);

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
		
	public function consulta_clubes(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT * from clubes");
			$resultado->execute();
			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id']. 
					">".$r['codigo']."--".$r['nombre']."</option>";
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
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '2' ");
			
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
		
        $this->club_personal = trim($this->club_personal);
        $this->cedula_personal = trim($this->cedula_personal);
        $this->telefono_personal = trim($this->telefono_personal);
        $this->cargo_personal = trim($this->cargo_personal);
        
		$this->nombres_personal = trim($this->nombres_personal);
		$this->apellidos_personal = trim($this->apellidos_personal);
		$this->direccion_personal = trim($this->direccion_personal);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->club_personal)){
			return false;
		}
		
		else if (!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_personal)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,30}$/',$this->nombres_personal)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,30}$/',$this->apellidos_personal)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{11}$/',$this->telefono_personal)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ\b]{5,15}$/',$this->cargo_personal)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ0-9,# -]{3,30}$/',$this->direccion_personal)){
			return false;
		}
		else{
			return true;
		}
	}

}

?>