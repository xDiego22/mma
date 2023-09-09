<?php  
 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
class inscripcion_evento extends conexion{
  
	private $evento_inscripcion;
	private $cedula_inscripcion;
	private $nombre_inscripcion;
	private $sexo_inscripcion;
	private $peso_inscripcion;
	private $fechadenacimiento;
	private $estado;

	private $permiso;

	
	public function set_evento_inscripcion($valor){
		$this->evento_inscripcion = $valor;
	}

	public function set_cedula_inscripcion($valor){
		$this->cedula_inscripcion = $valor;
	}

	public function set_nombre_inscripcion($valor){
		$this->nombre_inscripcion = $valor;
	}

	public function set_sexo_inscripcion($valor){
		$this->sexo_inscripcion = $valor;
	}

	public function set_peso_inscripcion($valor){
		$this->peso_inscripcion = $valor;
	}

	public function set_fechadenacimiento($valor){
		$this->fechadenacimiento = $valor;
	}

	public function set_estado($valor){
		$this->estado = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}

	//get = leer/obtener 

	public function get_evento_inscripcion($valor){
		return	$this->evento_inscripcion;
	}

	public function get_cedula_inscripcion($valor){
		return	$this->cedula_inscripcion;
	}

	public function get_nombre_inscripcion($valor){
		return	$this->nombre_inscripcion;
	}

	public function get_sexo_inscripcion($valor){
		return	$this->sexo_inscripcion;
	}

	public function get_peso_inscripcion($valor){
		return	$this->peso_inscripcion;
	}

	public function get_fechadenacimiento($valor){
		return	$this->fechadenacimiento;
	}

	public function get_estado($valor){
		return	$this->estado;
	}

	function get_permiso(){
		return $this->permiso;
	}

	public function incluir($rol_usuario,$cedula_bitacora,$modulo){
		
		$valor = $this->permisos($rol_usuario); //rol del usuario

		if ($valor[1]=="true") {

			if($this->validar_incluir()){
				if(!$this->existe($this->cedula_inscripcion)){
	
					$co = $this->conecta();
					$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//se añaden atributos a la conección para poder controlar los errores
					//atributos para poder manejar los posibles errores
	
					try {
	
						$resultado = $co->prepare("INSERT into inscripcion_evento(
						id_evento, 
						cedula,
						nombre,
						sexo,
						peso,
						fechadenacimiento,
						estado)
						Values(
						:evento_inscripcion,
						:cedula_inscripcion,
						:nombre_inscripcion,
						:sexo_inscripcion,
						:peso_inscripcion,
						:fechadenacimiento,
						:estado)");
	
						$resultado->bindParam(':evento_inscripcion',$this->evento_inscripcion);
						$resultado->bindParam(':cedula_inscripcion',$this->cedula_inscripcion);
						$resultado->bindParam(':nombre_inscripcion',$this->nombre_inscripcion);
						$resultado->bindParam(':sexo_inscripcion',$this->sexo_inscripcion);
						$resultado->bindParam(':peso_inscripcion',$this->peso_inscripcion);
						$resultado->bindParam(':fechadenacimiento',$this->fechadenacimiento);
						$resultado->bindParam(':estado',$this->estado);
		
						$resultado->execute();
						$accion= "Ha inscrito un Atleta en un Evento";
	
						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
						
						return $this->muestra_inscritos($this->evento_inscripcion,$rol_usuario,$cedula_bitacora,$modulo);
					}catch (Exception $e) {
						return $e->getMessage();
					}
	
				}
				else { 
					return "Ya existe atleta en el evento";
				}
			}else{
				return 'ingrese datos correctamente';
			}
		}else{
			return 'no tiene permiso para registrar';
		}

	}


	private function existe($cedula_inscripcion){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//se hace un try esto hace que en caso de error el programa continue por cath
		try {
			//se asigna a $resultado la consulta prepare para conocer si existe el registro
			$resultado = $co->prepare("SELECT * from inscripcion_evento where 
			cedula = :cedula_inscripcion and id_evento = :evento_inscripcion");

			$resultado->bindParam(':cedula_inscripcion',$this->cedula_inscripcion);
			$resultado->bindParam(':evento_inscripcion',$this->evento_inscripcion);

			$resultado->execute();

			//se combierte el resultado en un arreglo asociativo 
			//y se asigna a la variable $fila
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ //si $fila, significa que encontro el Id del atleta

				return true; //retorna verdadero
			    
			}
			else{
				
				return false; //retorna falso en caso de que no consiga la cedula
			}
			
		}
		catch(Exception $e){
			//si estra aca es que hubo algun error por lo que tambien me retornara que no la encontro
			return false;
		}
	}

	public function consulta_eventos(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT * from eventos");
			$resultado->execute();
			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id'].">".$r['nombre']."</option>";
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

	public function muestra_inscritos($evento, $rol_usuario, $cedula_bitacora,$modulo){
		
		$valor = $this->permisos($rol_usuario); //rol del usuario

		if ($valor[0]=="true") {
			if(preg_match_all('/^[0-9\b]{1,10}$/',$evento)){
				$co = $this->conecta();
				$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				try{
					$resultado = $co->prepare("SELECT a.cedula, a.nombre, a.sexo,
					TIMESTAMPDIFF(YEAR,a.fechadenacimiento,CURDATE()) as edad, a.peso, a.estado, b.id from inscripcion_evento as a, 
					eventos as b where a.id_evento = b.id 
					and b.id = '$evento'");
					$resultado->execute();
					if($resultado){
		
						$respuesta = '';
						//ciclo foreach se usa para recorrer los resultados de las consultas
						foreach($resultado as $r){ 
							
							$respuesta = $respuesta."<tr>";

								$respuesta = $respuesta."<td>";
									if(is_file("img/atletas/".$r[0].".png")){
										$foto = 	"img/atletas/".$r[0].".png";
									}
									else{
										$foto = "img/atletas/icono_persona.png";	
									} 
									$respuesta = $respuesta."
									<img src='".$foto."' style='width:55px' 
									class='rounded-circle' />";
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
									$respuesta = $respuesta.$r[4];
								$respuesta = $respuesta."</td>";

								$respuesta = $respuesta."<td>";
									$respuesta = $respuesta.$r[5];
								$respuesta = $respuesta."</td>";

								$respuesta = $respuesta."<td>";
									if ($valor[3]=="true"){
										$respuesta = $respuesta."<button type='button' class='btn btn-danger mb-1' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
									}
								$respuesta = $respuesta."</td>";

								$respuesta = $respuesta."<td style='display:none;'>";
									$respuesta = $respuesta.$r[6];
								$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."</tr>";
							
						}
						$accion= "Ha consultado la tabla de Atletas Inscritos en Evento";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
						return $respuesta;
					}
					else {
						return '';
					}

				}catch(Exception $e) {
					return $e->getMessage();
				}
			}else{
				return 'ingrese datos correctamente';
			}
		}else{
			return 'no tiene permiso de realizar esta accion';
		}
	}
	
	
	public function elimina_atletas($evento_inscripcion,$cedula_inscripcion, $cedula_bitacora,$modulo,$rol_usuario){

		$valor = $this->permisos($rol_usuario); //rol del usuario

		if ($valor[3]=="true") {

			if($this->validar_eliminar($evento_inscripcion,$cedula_inscripcion)){
				$co = $this->conecta();
				$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				try{
	
					$elimina = $co->prepare("DELETE from 
					inscripcion_evento  where 
					cedula = '$cedula_inscripcion' 
					and id_evento = '$evento_inscripcion'");
	
					$elimina->execute();
	
					if($elimina){
						
						$accion= "Ha eliminado un Atleta Inscrito en un Evento";
	
						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
	
						return 'eliminado';
					}
					else {
						return 'noelimino';
					}
	
				}catch(Exception $e) {
					return $e->getMessage();
				}
			}else{
				return 'ingrese datos correctamente';
			}

		}else{
			return 'no tiene permiso para eliminar';
		}

	}

	public function consulta_cedula(){
		if(preg_match_all("/^[0-9\b]{7,8}$/",$this->cedula_inscripcion)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try{
				
				$resultado = $co->prepare("SELECT  CONCAT(nombre,' ',apellido) as nombre ,sexo ,fechadenacimiento, peso from atletas where cedula='$this->cedula_inscripcion'");
				$resultado->execute();
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				if($fila){
					
					$envia = array('resultado'=>"encontro");
					
					$envia += $fila;
									
					return json_encode($envia);
					
				}
				else{
					
					$envia = array('resultado'=>"noencontro");
					return json_encode($envia);
					
					
				}
				
			}catch(Exception $e){
				$envia = array('resultado'=>$e->getMessage());
				return json_encode($envia);
			}
		}else{
			return 'ingrese datos correctamente';
		}
	}

	public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '10' ");
			
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
				return "";
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}

	public function validar_incluir(){

		$this->evento_inscripcion = trim($this->evento_inscripcion);
		$this->cedula_inscripcion =trim($this->cedula_inscripcion);
		$this->sexo_inscripcion = trim($this->sexo_inscripcion);
		$this->fechadenacimiento = trim($this->fechadenacimiento);
		
		$this->nombre_inscripcion = trim($this->nombre_inscripcion);
		$this->peso_inscripcion = trim($this->peso_inscripcion);
		$this->estado = trim($this->estado);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->evento_inscripcion)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_inscripcion)){
			return false;
		}
		else if (!preg_match_all('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->nombre_inscripcion)){
			return false;
		}
		else if (!preg_match_all('/^[a-zA-Z\b]{6,10}$/',$this->sexo_inscripcion)){
			return false;
		}
		else if(!preg_match_all('/^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/',$this->peso_inscripcion)){
			return false;
		}
		
		else if(!preg_match_all('/^(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))$/',$this->fechadenacimiento)){
			return false;
		}
		
		else if(!preg_match_all('/^[A-Za-z ]{3,20}$/',$this->estado)){
			return false;
		}
		
		else{
			return true;
		}
	}
	
	public function validar_eliminar($evento_inscripcion,$cedula_inscripcion){

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$evento_inscripcion)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{7,8}$/',$cedula_inscripcion)){
			return false;
		}
		else{
			return true;
		}
	}
} 
?>