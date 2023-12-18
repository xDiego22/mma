<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
 
class socioeconomico_atleta extends conexion{
    //atributos
    private $nombre_atleta;
    private $tipo_vivienda;
	private $zona_vivienda;
	private $propiedad_vivienda;
	private $habitantes_vivienda;
	private $internet;
	private $luz;
	private $agua;
	private $telefono_residencial;
	private $cable;

	private $permiso;
	
    //socioeconomico
    public function set_nombre_atleta($valor){
		$this->nombre_atleta = $valor;
	}

	public function set_tipo_vivienda($valor){
		$this->tipo_vivienda = $valor;
	}
	public function set_zona_vivienda($valor){
		$this->zona_vivienda = $valor;
	}

	public function set_propiedad_vivienda($valor){
		$this->propiedad_vivienda = $valor;
	}
	public function set_habitantes_vivienda($valor){
		$this->habitantes_vivienda = $valor;
	}

	public function set_internet($valor){
		$this->internet = $valor;
	}
	public function set_luz($valor){
		$this->luz = $valor;
	}

	public function set_agua($valor){
		$this->agua = $valor;
	}
	public function set_telefono_residencial($valor){
		$this->telefono_residencial = $valor;
	}

	public function set_cable($valor){
		$this->cable = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}

    //socioeconomico
    public function get_nombre_atleta($valor){
		return	$this->nombre_atleta;

	}

	public function get_tipo_vivienda($valor){
		return	$this->tipo_vivienda;
	}
	public function get_zona_vivienda($valor){
		return	$this->zona_vivienda;
	}

	public function get_propiedad_vivienda($valor){
		return	$this->propiedad_vivienda;
	}
	public function get_habitantes_vivienda($valor){
		return	$this->habitantes_vivienda;
	}

	public function get_internet($valor){
		return	$this->internet;
	}
	public function get_luz($valor){
		return	$this->luz;
	}

	public function get_agua($valor){
		return	$this->agua;
	}
	public function get_telefono_residencial($valor){
		return	$this->telefono_residencial;
	}

	public function get_cable($valor){
		return	$this->cable;
	}

	function get_permiso(){
		return $this->permiso;
	}
 
    public function registrar($rol_usuario, $cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if ($valor[1]=="true") {
			if($this->validar()){
				if(!$this->existe($this->nombre_atleta)){

					$co = $this->conecta();
					$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					

					try{

						$resultado = $co->prepare("INSERT into informacion_socioeconomica(
							id_atleta,
							tipo_vivienda,
							zona_vivienda,
							propiedad_vivienda,
							habitantes_hogar,
							internet,
							luz,
							agua,
							telefono_residencial,
							cable)
							Values(
							:nombre_atleta,
							:tipo_vivienda,
							:zona_vivienda,
							:propiedad_vivienda,
							:habitantes_vivienda,
							:internet,
							:luz,
							:agua,
							:telefono_residencial,
							:cable)");

						//nuevo socioeconomico
						$resultado->bindParam(':nombre_atleta',$this->nombre_atleta);
						
						$resultado->bindParam(':tipo_vivienda',$this->tipo_vivienda);
						$resultado->bindParam(':zona_vivienda',$this->zona_vivienda);

						$resultado->bindParam(':propiedad_vivienda',$this->propiedad_vivienda);
						$resultado->bindParam(':habitantes_vivienda',$this->habitantes_vivienda);

						$resultado->bindParam(':internet',$this->internet);
						$resultado->bindParam(':luz',$this->luz);

						$resultado->bindParam(':agua',$this->agua);
						$resultado->bindParam(':telefono_residencial',$this->telefono_residencial);
						$resultado->bindParam(':cable',$this->cable);
						
						
						
						$resultado->execute();

						$accion= "Ha registrado Datos Socioeconomicos de un Atleta";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

						return 'Registrado Correctamente';
					}catch(Exception $e){
						return $e->getMessage();
					}

				}else {
					return "Ya existe atleta con la informacion que desea ingresar";
				}
			}else{
				return 'ingrese datos correctamente';
			}
		}else {
			return "no tiene permiso para registrar";
		}
    }

    public function modificar($rol_usuario,$cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if ($valor[2]=="true") {
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($this->validar()){
				if($this->existe($this->nombre_atleta)){

					try{

						$resultado = $co->prepare("UPDATE informacion_socioeconomica set
							id_atleta = :nombre_atleta,
							tipo_vivienda = :tipo_vivienda,
							zona_vivienda = :zona_vivienda,
							propiedad_vivienda = :propiedad_vivienda,
							habitantes_hogar = :habitantes_vivienda,
							internet = :internet,
							luz = :luz,
							agua = :agua,
							telefono_residencial = :telefono_residencial,
							cable = :cable
							where id_atleta = :nombre_atleta");

						
						//nuevo socioeconomico
						$resultado->bindParam(':nombre_atleta',$this->nombre_atleta);
						
						$resultado->bindParam(':tipo_vivienda',$this->tipo_vivienda);
						$resultado->bindParam(':zona_vivienda',$this->zona_vivienda);

						$resultado->bindParam(':propiedad_vivienda',$this->propiedad_vivienda);
						$resultado->bindParam(':habitantes_vivienda',$this->habitantes_vivienda);

						$resultado->bindParam(':internet',$this->internet);
						$resultado->bindParam(':luz',$this->luz);

						$resultado->bindParam(':agua',$this->agua);
						$resultado->bindParam(':telefono_residencial',$this->telefono_residencial);
						$resultado->bindParam(':cable',$this->cable);

						$resultado->execute();	
						
						$accion= "Ha modificado Datos Socioeconomicos de un Atleta";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
							
						return 'Modificado Correctamente';
						
					} catch(Exception $e) {
						return $e->getMessage();
					}
				}
				else {
					return "informacion de atleta no registrado";
				}
			}else{
				return 'ingrese datos correctamente';
			}
		}else {
			return "no tiene permiso para modificar";
		}
	}
 
    public function eliminar($cedula_bitacora,$modulo,$rol_usuario){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if ($valor[3]=="true") {
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if(preg_match_all('/^[0-9\b]{1,10}$/',$this->nombre_atleta)){
				if($this->existe($this->nombre_atleta)){

					try{

						$resultado = $co->prepare("DELETE from informacion_socioeconomica where id_atleta = :nombre_atleta");

						$resultado->bindParam(':nombre_atleta',$this->nombre_atleta);

						$resultado->execute();		
						
						if ($resultado) {
							$accion= "Ha eliminado Datos Socioeconomicaos de un Atleta";

							parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
							return "eliminado";
						}
						else{
							return "no eliminado";
						}
						
					} catch(Exception $e) {
						return $e->getMessage();
					}
				}
				else {
					return "informacion de atleta no registrado";
				}
			}else{
				return 'ingrese datos correctamente';
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

				$stmt = $co->prepare("SELECT 
                b.id, 
                b.cedula, 
                CONCAT(b.nombre,' ',b.apellido), 
                a.tipo_vivienda,
				a.zona_vivienda,
                a.habitantes_hogar,
                a.propiedad_vivienda,
				a.internet, 
                a.luz,
				a.agua, 
                a.telefono_residencial,
				a.cable 
                from informacion_socioeconomica as a, atletas as b where a.id_atleta = b.id");

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
					$subarray['id_atleta'] = $fila[0];
					$subarray['cedula'] = $fila[1];
					$subarray['nombre'] = $fila[2];
					$subarray['tipo_vivienda'] = $fila[3];
					$subarray['zona_vivienda'] = $fila[4];
					$subarray['habitantes_hogar'] = $fila[5];
					$subarray['propiedad_vivienda'] = $fila[6];
					$subarray['internet'] = $fila[7];
					$subarray['agua'] = $fila[8];
					$subarray['luz'] = $fila[9];
					$subarray['telefono_residencial'] = $fila[10];
					$subarray['cable'] = $fila[11];
					$subarray['opciones'] = $opciones;

					$datos[] = $subarray;
				}
				$json = array(
					"data" => $datos
				);

				$accion= "Ha consultado la tabla de Datos Socioeconomicos";

				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

				return json_encode($json);


			}else{
				return 'No tiene permiso de realizar esta accion';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}

	}

    private function existe($nombre_atleta){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		try {
			
			$resultado = $co->prepare("SELECT * from informacion_socioeconomica where id_atleta=:nombre_atleta");

			$resultado->bindParam(':nombre_atleta',$nombre_atleta);

			$resultado->execute();
			//se combierte el resultado en un arreglo asociativo 
			//y se asigna a la variable $fila
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 
				return true; //retorna verdadero
			}
			else{
				return false; 
			}
			
		}
		catch(Exception $e){
			return false;
		}
	}

    public function consulta_atletas(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT * from atletas");
			$resultado->execute();
			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id'].">".$r['cedula']." -- ".$r['nombre']." ".$r['apellido']."</option>";
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
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '5' ");
			
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
		
		$this->nombre_atleta = trim($this->nombre_atleta);
		$this->tipo_vivienda = trim($this->tipo_vivienda);
		$this->zona_vivienda = trim($this->zona_vivienda);
		$this->habitantes_vivienda = trim($this->habitantes_vivienda);
		$this->propiedad_vivienda = trim($this->propiedad_vivienda);
		
		$this->internet = trim($this->internet);
		$this->luz = trim($this->luz);
		$this->agua = trim($this->agua);
		$this->telefono_residencial = trim($this->telefono_residencial);
		$this->cable = trim($this->cable);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->nombre_atleta)){
			return false;
		}
		else if (!preg_match_all('/^[A-Za-z\b]{3,14}$/',$this->tipo_vivienda)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z\b]{4,8}$/',$this->zona_vivienda)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z\b]{3,10}$/',$this->propiedad_vivienda)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->habitantes_vivienda)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z ]{3,8}$/',$this->internet)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z ]{3,8}$/',$this->luz)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z ]{3,8}$/',$this->agua)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z ]{3,8}$/',$this->telefono_residencial)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z ]{3,8}$/',$this->cable)){
			return false;
		}
		else{
			return true;
		}
	}

}

?>