<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

use flight;

class gestionar_atleta extends conexion{

	//atributos privados
	private $club_atleta;
	private $cedula_atleta;
	private $nombres_atleta;
	private $apellidos_atleta;
	private $peso_atleta;
	private $estatura_atleta;
	private $fecha_atleta;
	private $telefono_atleta;
	private $sexo_atleta;
	private $deporte_atleta;
	private $categoria_atleta;
	private $fecha_ingreso_atleta;
	private $entrenador_atleta;

	private $foto = null;
	
	private $permiso;
	
	public function set_foto($valor){
		$this->foto = $valor;
	}
	public function set_club_atleta($valor){
		$this->club_atleta = $valor;
	}

	public function set_cedula_atleta($valor){
		$this->cedula_atleta = $valor;
	}

	public function set_nombres_atleta($valor){
		$this->nombres_atleta = $valor;
	}

	public function set_apellidos_atleta($valor){
		$this->apellidos_atleta = $valor;
	}

	public function set_peso_atleta($valor){
		$this->peso_atleta = $valor;
	}

	public function set_estatura_atleta($valor){
		$this->estatura_atleta = $valor;
	}

	public function set_fecha_atleta($valor){
		$this->fecha_atleta = $valor;
	}

	public function set_telefono_atleta($valor){
		$this->telefono_atleta = $valor;
	}

	public function set_sexo_atleta($valor){
		$this->sexo_atleta = $valor;
	}

	public function set_deporte_atleta($valor){
		$this->deporte_atleta = $valor;
	}

	public function set_categoria_atleta($valor){
		$this->categoria_atleta = $valor;
	}

	public function set_fecha_ingreso_atleta($valor){
		$this->fecha_ingreso_atleta = $valor;
	}

	public function set_entrenador_atleta($valor){
		$this->entrenador_atleta = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}

	//get = leer/obtener 

	public function get_club_atleta($valor){
		return	$this->club_atleta;
	}
 
	public function get_cedula_atleta($valor){
		return	$this->cedula_atleta;
	}

	public function get_nombres_atleta($valor){
		return	$this->nombres_atleta;
	}

	public function get_apellidos_atleta($valor){
		return	$this->apellidos_atleta;
	}

	public function get_peso_atleta($valor){
		return	$this->peso_atleta;
	}

	public function get_estatura_atleta($valor){
		return	$this->estatura_atleta;
	}

	public function get_fecha_atleta($valor){
		return	$this->fecha_atleta;
	}

	public function get_telefono_atleta($valor){
		return	$this->telefono_atleta;
	}

	public function get_sexo_atleta($valor){
		return	$this->sexo_atleta;
	}

	public function get_deporte_atleta($valor){
		return	$this->deporte_atleta;
	}

	public function get_categoria_atleta($valor){
		return	$this->categoria_atleta;
	}

	public function get_fecha_ingreso_atleta($valor){
		return	$this->fecha_ingreso_atleta;
	}

	public function get_entrenador_atleta($valor){
		return	$this->entrenador_atleta;
	}

	function get_permiso(){
		return $this->permiso;
	}

 
	//metodos
	public function registrar($rol_usuario,$cedula_bitacora,$modulo){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[1]=="true"){
		
			if($this->validar()){
				if(!$this->existe($this->cedula_atleta)){

					
					$co = $this->conecta();
					$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//se añaden atributos a la conección para poder controlar los errores
					//atributos para poder manejar los posibles errores
					
						try{

							$resultado = $co->prepare("INSERT into atletas(
								id_club,
								cedula,
								nombre,
								apellido,
								peso,
								estatura,
								fechadenacimiento,
								telefono,
								sexo,
								deportebase,
								categoria,
								fechaingresoclub,
								entrenador)
								Values(
								:club_atleta,
								:cedula_atleta,
								:nombres_atleta,
								:apellidos_atleta,
								:peso_atleta,
								:estatura_atleta,
								:fecha_atleta,
								:telefono_atleta,
								:sexo_atleta,
								:deporte_atleta,
								:categoria_atleta,
								:fecha_ingreso_atleta,
								:entrenador_atleta)");

							$resultado->bindParam(':club_atleta',$this->club_atleta);
							$resultado->bindParam(':cedula_atleta',$this->cedula_atleta);
							$resultado->bindParam(':nombres_atleta',$this->nombres_atleta);
							$resultado->bindParam(':apellidos_atleta',$this->apellidos_atleta);
							$resultado->bindParam(':peso_atleta',$this->peso_atleta);
							$resultado->bindParam(':estatura_atleta',$this->estatura_atleta);
							$resultado->bindParam(':fecha_atleta',$this->fecha_atleta);
							$resultado->bindParam(':telefono_atleta',$this->telefono_atleta);
							$resultado->bindParam(':sexo_atleta',$this->sexo_atleta);
							$resultado->bindParam(':deporte_atleta',$this->deporte_atleta);
							$resultado->bindParam(':categoria_atleta',$this->categoria_atleta);
							$resultado->bindParam(':fecha_ingreso_atleta',$this->fecha_ingreso_atleta);
							$resultado->bindParam(':entrenador_atleta',$this->entrenador_atleta);
							
							$resultado->execute();

							$accion= "Ha regitrado un nuevo Atleta";

							parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

							return "Registrado Correctamente";

						}catch(Exception $e){
							return $e->getMessage();
						}
					
				} 
				else {
					return "Ya existe atleta con la cedula que desea ingresar";
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
		if($valor[2]=="true"){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if($this->validar()){
				
				if($this->existe($this->cedula_atleta)){

					try{

						$resultado = $co->prepare("UPDATE atletas set
							id_club = :club_atleta,
							nombre = :nombres_atleta,
							apellido = :apellidos_atleta,
							peso = :peso_atleta,
							estatura = :estatura_atleta,
							fechadenacimiento = :fecha_atleta,
							telefono = :telefono_atleta,
							sexo = :sexo_atleta,
							deportebase = :deporte_atleta,
							categoria = :categoria_atleta,
							fechaingresoclub = :fecha_ingreso_atleta,
							entrenador =:entrenador_atleta
							where cedula = :cedula_atleta");

						$resultado->bindParam(':club_atleta',$this->club_atleta);
						$resultado->bindParam(':nombres_atleta',$this->nombres_atleta);
						$resultado->bindParam(':apellidos_atleta',$this->apellidos_atleta);
						$resultado->bindParam(':peso_atleta',$this->peso_atleta);
						$resultado->bindParam(':estatura_atleta',$this->estatura_atleta);
						$resultado->bindParam(':fecha_atleta',$this->fecha_atleta);
						$resultado->bindParam(':telefono_atleta',$this->telefono_atleta);
						$resultado->bindParam(':sexo_atleta',$this->sexo_atleta);
						$resultado->bindParam(':deporte_atleta',$this->deporte_atleta);
						$resultado->bindParam(':categoria_atleta',$this->categoria_atleta);
						$resultado->bindParam(':fecha_ingreso_atleta',$this->fecha_ingreso_atleta);
						$resultado->bindParam(':entrenador_atleta',$this->entrenador_atleta);
						$resultado->bindParam(':cedula_atleta',$this->cedula_atleta);

						$resultado->execute();
						
						$accion= "Ha modificado un Atleta";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
							
						return "Modificado Correctamente";

					} catch(Exception $e) {
						return $e->getMessage();
					}
				}
				else {
					return "Atleta no registrado";
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
		if($valor[3]=="true"){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if(preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_atleta)){

				if($this->existe($this->cedula_atleta)){

					try{

						$resultado = $co->prepare("DELETE from atletas where cedula = :cedula_atleta");

						$resultado->bindParam(':cedula_atleta',$this->cedula_atleta);

						$resultado->execute();

						if ($resultado) {
							$accion= "Ha eliminado un Atleta";

							parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
							if(is_file("img/atletas/".$this->cedula_atleta.".png")){
								unlink("img/atletas/".$this->cedula_atleta.".png");
							}
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
					return "Atleta no registrado";
				}
			}else{
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

				$stmt = $co->prepare("SELECT a.cedula,a.nombre, a.apellido,a.peso,a.estatura,a.fechadenacimiento,a.telefono,a.sexo,a.deportebase,a.categoria,a.fechaingresoclub,a.entrenador,b.id,b.nombre from atletas as a, clubes as b where a.id_club = b.id");
	
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
	
					if(is_file("img/atletas/".$fila[0].".png")){
						$foto = 	"$fila[0]";
					}
					else{
						$foto = "icono_persona";	
					} 
					$subarray=array();
					$subarray['cedula']=$fila[0];
					$subarray['nombre']=$fila[1];
					$subarray['apellido']=$fila[2];
					$subarray['peso']=$fila[3];
					$subarray['estatura']=$fila[4];
					$subarray['fechadenacimiento']=$fila[5];
					$subarray['telefono']=$fila[6];
					$subarray['sexo']=$fila[7];
					$subarray['deportebase']=$fila[8];
					$subarray['categoria']=$fila[9];
					$subarray['fechaingresoclub']=$fila[10];
					$subarray['entrenador']=$fila[11];
					$subarray['idclub']=$fila[12];
					$subarray['nombre_club']=$fila[13];
					$subarray['img']=$foto;
					$subarray['opciones']=$opciones;

					$datos[] = $subarray;
				}
				$json = array(
					"data" => $datos
				);
				
				$accion= "Ha consultado la tabla de Atletas";
				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
	
				return json_encode($json);
			}else{
				return 'No tiene permiso de realizar esta accion';
			}

		}catch(Exception $e) {
			return $e->getMessage();
		}

	}

	private function existe($cedula_atleta){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//se hace un try esto hace que en caso de error el programa continue por cath
		try {

			//se asigna a $resultado la consulta prepare para conocer si existe el registro
			$resultado = $co->prepare("Select * from atletas where cedula=:cedula_atleta");
 
			$resultado->bindParam(':cedula_atleta',$cedula_atleta);

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
		if(preg_match_all("/^[0-9]{1,10}$/",$rol)){
			try{
				
				
				$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '3' ");
				
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
		}else{
			return false;
		}
	}

	public function validar(){

        $this->club_atleta = trim($this->club_atleta);
        $this->cedula_atleta = trim($this->cedula_atleta);
        $this->peso_atleta = trim($this->peso_atleta);
        $this->estatura_atleta = trim($this->estatura_atleta);
        $this->fecha_atleta = trim($this->fecha_atleta);
        $this->telefono_atleta = trim($this->telefono_atleta);
        $this->sexo_atleta = trim($this->sexo_atleta);
        $this->deporte_atleta = trim($this->deporte_atleta);
        $this->fecha_ingreso_atleta = trim($this->fecha_ingreso_atleta);
        
		$this->nombres_atleta = trim($this->nombres_atleta);
		$this->apellidos_atleta = trim($this->apellidos_atleta);
		$this->categoria_atleta = trim($this->categoria_atleta);
		$this->entrenador_atleta = trim($this->entrenador_atleta);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->club_atleta)){
			return false;
		}
		else if (!preg_match_all('/^[0-9\b]{7,8}$/',$this->cedula_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,25}$/',$this->nombres_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,25}$/',$this->apellidos_atleta)){
			return false;
		}
		else if(!preg_match_all('/^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/',$this->peso_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^[0-3]{1}[.]{1}[0-9]{1,2}$/',$this->estatura_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))$/',$this->fecha_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^[0-9\b]{11}$/',$this->telefono_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^[A-Za-z\b]{7,10}$/',$this->sexo_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^[a-zA-Z\b]{1,10}$/',$this->deporte_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^[A-Za-z0-9 ]{8,11}$/',$this->categoria_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))$/',$this->fecha_ingreso_atleta)){
			return false;
		}
		
		else if(!preg_match_all('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,25}$/',$this->entrenador_atleta)){
			return false;
		}
		else{
			return true;
		}
	}

	/*---- APP ----*/
	public function atletasApp(){
		try{
			if(!$this->validarTokenApp()){
				Flight::halt(403,json_encode([
					'error' => 'Unauthorized',
					'status' => 'error'
				]));
			}

			$db = $this->conecta();
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$stmt = $db->prepare("SELECT a.id_club, c.nombre AS nombre_club, a.cedula, a.nombre, a.apellido, a.peso, a.estatura, a.fechadenacimiento, a.telefono, a.sexo, a.deportebase, a.categoria, a.fechaingresoclub, a.entrenador
                     FROM atletas AS a
                     LEFT JOIN clubes AS c ON a.id_club = c.id");

			$stmt->execute();

			// Obtiene todos los resultados como un array asociativo sin duplicaciones
			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

			Flight::json($resultados);
		}catch(Exception $e) {
			echo $e->getMessage();
		}
	}

}
?>