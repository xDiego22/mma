<?php 

namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
class medico_atleta extends conexion{
    //atributos
    private $nombre_atleta;
    private $medicamento_atleta;
    private $enfermedad_atleta;
    private $discapacidad_atleta;
    private $dieta_atleta;
    private $enfermedades_pasadas;
    private $nombre_parentesco;
    private $telefono_parentesco;
    private $relacion_parentesco;

	private $permiso;

    //set 
    //lo nuevo desde aqui medico
    public function set_nombre_atleta($valor){
		$this->nombre_atleta = $valor;
	}

	public function set_medicamento_atleta($valor){
		$this->medicamento_atleta = $valor;
	}
	public function set_enfermedad_atleta($valor){
		$this->enfermedad_atleta = $valor;
	}

	public function set_discapacidad_atleta($valor){
		$this->discapacidad_atleta = $valor;
	}
	public function set_dieta_atleta($valor){
		$this->dieta_atleta = $valor;
	}

	public function set_enfermedades_pasadas($valor){
		$this->enfermedades_pasadas = $valor;
	}
	public function set_nombre_parentesco($valor){
		$this->nombre_parentesco = $valor;
	}

	public function set_telefono_parentesco($valor){
		$this->telefono_parentesco = $valor;
	}
	public function set_relacion_parentesco($valor){
		$this->relacion_parentesco = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}

    //lo nuevo desde aqui medico
    public function get_nombre_atleta($valor){
		return	$this->nombre_atleta;

	}

	public function get_medicamento_atleta($valor){
		return	$this->medicamento_atleta;
	}
	public function get_enfermedad_atleta($valor){
		return	$this->enfermedad_atleta;
	}

	public function get_discapacidad_atleta($valor){
		return	$this->discapacidad_atleta;
	}
	public function get_dieta_atleta($valor){
		return	$this->dieta_atleta;
	}

	public function get_enfermedades_pasadas($valor){
		return	$this->enfermedades_pasadas;
	}
	public function get_nombre_parentesco($valor){
		return	$this->nombre_parentesco;
	}

	public function get_telefono_parentesco($valor){
		return	$this->telefono_parentesco;
	}
	public function get_relacion_parentesco($valor){
		return	$this->relacion_parentesco;
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

						$resultado = $co->prepare("INSERT into informacion_medica(
							id_atleta,
							medicamento,
							enfermedad,
							discapacidad,
							dieta,
							enfermedades_pasadas,
							nombre_parentesco,
							telefono_parentesco,
							tipo_parentesco)
							Values(
							:nombre_atleta,
							:medicamento_atleta,
							:enfermedad_atleta,
							:discapacidad_atleta,
							:dieta_atleta,
							:enfermedades_pasadas,
							:nombre_parentesco,
							:telefono_parentesco,
							:relacion_parentesco)");

						//datos a encriptar
						$this->enfermedad_atleta = parent::encriptar($this->enfermedad_atleta);
						$this->discapacidad_atleta = parent::encriptar($this->discapacidad_atleta);
						$this->enfermedades_pasadas = parent::encriptar($this->enfermedades_pasadas);
						//<----  ----->

						$resultado->bindParam(':nombre_atleta',$this->nombre_atleta);
						$resultado->bindParam(':medicamento_atleta',$this->medicamento_atleta);
						$resultado->bindParam(':enfermedad_atleta',$this->enfermedad_atleta);
						$resultado->bindParam(':discapacidad_atleta',$this->discapacidad_atleta);
						$resultado->bindParam(':dieta_atleta',$this->dieta_atleta);
						$resultado->bindParam(':enfermedades_pasadas',$this->enfermedades_pasadas);
						$resultado->bindParam(':nombre_parentesco',$this->nombre_parentesco);
						$resultado->bindParam(':telefono_parentesco',$this->telefono_parentesco);
						$resultado->bindParam(':relacion_parentesco',$this->relacion_parentesco);
						
						$resultado->execute();

						$accion= "Ha registrado Datos Medicos de un Atleta";

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

    public function modificar($rol_usuario, $cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if ($valor[2]=="true") {
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($this->validar()){
				if($this->existe($this->nombre_atleta)){

					try{

						$resultado = $co->prepare("UPDATE informacion_medica set
							id_atleta = :nombre_atleta,
							medicamento = :medicamento_atleta,
							enfermedad = :enfermedad_atleta,
							discapacidad = :discapacidad_atleta,
							dieta = :dieta_atleta,
							enfermedades_pasadas = :enfermedades_pasadas,
							nombre_parentesco = :nombre_parentesco,
							telefono_parentesco = :telefono_parentesco,
							tipo_parentesco = :relacion_parentesco
							where id_atleta = :nombre_atleta");

						
						//datos a encriptar
						$this->enfermedad_atleta = parent::encriptar($this->enfermedad_atleta);
						$this->discapacidad_atleta = parent::encriptar($this->discapacidad_atleta);
						$this->enfermedades_pasadas = parent::encriptar($this->enfermedades_pasadas);
						//<----  ----->
						
						$resultado->bindParam(':nombre_atleta',$this->nombre_atleta);
						$resultado->bindParam(':medicamento_atleta',$this->medicamento_atleta);
						$resultado->bindParam(':enfermedad_atleta',$this->enfermedad_atleta);
						$resultado->bindParam(':discapacidad_atleta',$this->discapacidad_atleta);
						$resultado->bindParam(':dieta_atleta',$this->dieta_atleta);
						$resultado->bindParam(':enfermedades_pasadas',$this->enfermedades_pasadas);
						$resultado->bindParam(':nombre_parentesco',$this->nombre_parentesco);
						$resultado->bindParam(':telefono_parentesco',$this->telefono_parentesco);
						$resultado->bindParam(':relacion_parentesco',$this->relacion_parentesco);

						$resultado->execute();	
						
						$accion= "Ha modificado Datos Medicos de un Atleta";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
							
						return 'Modificado Correctamente';

					} catch(Exception $e) {
						return $e->getMessage();
					}
				}
				else {
					return "No registrado";
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

						$resultado = $co->prepare("DELETE from informacion_medica where id_atleta = :nombre_atleta");

						$resultado->bindParam(':nombre_atleta',$this->nombre_atleta);

						$resultado->execute();	

						if ($resultado) {
							$accion= "Ha eliminado Datos Medica de un Atleta";

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
					return "No registrado";
				}
			}else{
				return 'ingrese datos correctamente';
			}
		}else {
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

				$stmt = $co->prepare("SELECT a.medicamento,
				a.enfermedad, a.discapacidad, a.dieta, a.enfermedades_pasadas,
				a.nombre_parentesco, a.telefono_parentesco,
				a.tipo_parentesco, CONCAT(b.nombre,' ',b.apellido), b.id,
                b.cedula
                from informacion_medica as a, atletas as b where a.id_atleta = b.id");

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
					$subarray['id_atleta'] = $fila[9];
					$subarray['cedula'] = $fila[10];
					$subarray['nombre'] = $fila[8];
					$subarray['medicamento'] = $fila[0];
					$subarray['enfermedad'] = parent::desencriptar($fila[1]);
					$subarray['discapacidad'] = parent::desencriptar($fila[2]);
					$subarray['dieta'] = $fila[3];
					$subarray['enfermedades_pasadas'] = parent::desencriptar($fila[4]);
					$subarray['nombre_parentesco'] = $fila[5];
					$subarray['telefono_parentesco'] = $fila[6];
					$subarray['tipo_parentesco'] = $fila[7];
					$subarray['opciones'] = $opciones;

					$datos[] = $subarray;
				}
				$json = array(
					"data" => $datos
				);
				
				$accion= "Ha consultado la tabla de Datos Medicos";

				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
	
				return json_encode($json);
			} else {
				return 'No tiene permiso de realizar esta accion';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}

	}

    private function existe($nombre_atleta){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//se hace un try esto hace que en caso de error el programa continue por cath
		try {

			//se asigna a $resultado la consulta prepare para conocer si existe el registro
			$resultado = $co->prepare("SELECT * from informacion_medica where id_atleta=:nombre_atleta");

			$resultado->bindParam(':nombre_atleta',$nombre_atleta);

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
			
		}
		catch(Exception $e){
			//si estra aca es que hubo algun error por lo que tambien me retornara que no la encontro
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
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '4' ");
			
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
        $this->telefono_parentesco = trim($this->telefono_parentesco);        
        
		$this->nombre_parentesco = trim($this->nombre_parentesco);
		$this->relacion_parentesco = trim($this->relacion_parentesco);
		$this->medicamento_atleta = trim($this->medicamento_atleta);
		$this->enfermedad_atleta = trim($this->enfermedad_atleta);
		$this->discapacidad_atleta = trim($this->discapacidad_atleta);
		$this->dieta_atleta = trim($this->dieta_atleta);
		$this->enfermedades_pasadas = trim($this->enfermedades_pasadas);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->nombre_atleta)){
			return false;
		}
		else if (!preg_match_all('/^[A-Za-z0-9,.áéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->medicamento_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z0-9,.áéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->enfermedad_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z0-9,.áéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->discapacidad_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z0-9,.áéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->dieta_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-z0-9,.áéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->enfermedades_pasadas)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,50}$/',$this->nombre_parentesco)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{11}$/',$this->telefono_parentesco)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,20}$/',$this->relacion_parentesco)){
			return false;
		}
		else{
			return true;
		}
	}

}

?>