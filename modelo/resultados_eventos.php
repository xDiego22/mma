<?php  
 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

use flight;
 
class resultados_eventos extends conexion{
 
	//atributos privados
	private $nombre_evento;
	private $atleta_ganador;
	private $atleta_perdedor;
	private $forma_ganar;
	private $ronda;

    private $permiso;
	//acceder a atributos mediante metodos get y set

	//set = escribir
 
	public function set_nombre_evento($valor){
		$this->nombre_evento = $valor;
	}

	public function set_atleta_ganador($valor){
		$this->atleta_ganador = $valor;
	}

	public function set_atleta_perdedor($valor){
		$this->atleta_perdedor = $valor;
	}

	public function set_ronda($valor){
		$this->ronda = $valor;
	}

	public function set_forma_ganar($valor){
		$this->forma_ganar = $valor;
	}

	function set_permiso($valor){
		$this->permiso = $valor;
	}

	//get = leer/escribir

	public function get_nombre_evento(){
		return $this->nombre_evento;
	}

	public function get_atleta_ganador($valor){
		return $this->atleta_ganador;
	}

	public function get_atleta_perdedor($valor){
		return $this->atleta_perdedor;
	}

	public function get_ronda($valor){
		return $this->ronda;
	}

	public function get_forma_ganar($valor){
		return $this->forma_ganar;
	}

    function get_permiso(){
		return $this->permiso;
	}

	//metodos 

	public function registrar($rol_usuario,$cedula_bitacora,$modulo){

		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[1]=="true"){

			if($this->validar()){
				if(!$this->existe($this->nombre_evento,$this->atleta_ganador,$this->atleta_perdedor,$this->forma_ganar,$this->ronda)){

					$co = $this->conecta();
					$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					try{
						$resultado = $co->prepare("INSERT into resultados(
							id_evento,
							atleta1, 
							atleta2,
							forma_ganar, 
							ronda)
							Values(
							:nombre_evento,
							:atleta_ganador,
							:atleta_perdedor,
							:forma_ganar,
							:ronda)");

						$resultado->bindParam(':nombre_evento',$this->nombre_evento);
						$resultado->bindParam(':atleta_ganador',$this->atleta_ganador);
						$resultado->bindParam(':atleta_perdedor',$this->atleta_perdedor);
						$resultado->bindParam(':forma_ganar',$this->forma_ganar);
						$resultado->bindParam(':ronda',$this->ronda);
		
						$resultado->execute();

						$accion= "Ha registrado un resultado de eventos";

						parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
						return $this->consultar($rol_usuario,$cedula_bitacora,$modulo);

					}catch(Exception $e){
						return $e->getMessage();
					}
				}
				else{
					return "Ya existe un ganador en este combate";
				}
			}else{
				return "ingrese datos correctamente";
			}
		}else {
			return "no tiene permiso para registrar";
		}

	}

	public function eliminar($cedula_bitacora,$modulo,$rol_usuario){
		$valor = $this->permisos($rol_usuario); //rol del usuario
		if($valor[3]=="true"){
			if($this->validar()){
				$co = $this->conecta();
				$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				if($this->existe($this->nombre_evento,$this->atleta_ganador,$this->atleta_perdedor,$this->forma_ganar,$this->ronda)){

					try{

						$resultado = $co->prepare("DELETE from resultados where id_evento = :nombre_evento 
						and atleta1 = :atleta_ganador 
						and atleta2 = :atleta_perdedor 
						and forma_ganar = :forma_ganar 
						and ronda = :ronda");

						$resultado->bindParam(':nombre_evento',$this->nombre_evento);
						$resultado->bindParam(':atleta_ganador',$this->atleta_ganador);
						$resultado->bindParam(':atleta_perdedor',$this->atleta_perdedor);
						$resultado->bindParam(':forma_ganar',$this->forma_ganar);
						$resultado->bindParam(':ronda',$this->ronda);
						
						$resultado->execute();
							
						if ($resultado) {
							$accion= "Ha eliminado un resultado de evento";

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
					return "Resultado no registrado";
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

			$resultado = $co->prepare("SELECT DISTINCT
			eventos.nombre,
			eventos.id,
			a1.nombre AS nombre1,
			a2.nombre AS nombre2,
			resultados.ronda,
			resultados.forma_ganar,
			resultados.atleta1,
			resultados.atleta2,
			resultados.id
			FROM resultados
			JOIN eventos ON eventos.id = resultados.id_evento
			LEFT JOIN inscripcion_evento a1 ON resultados.atleta1 = a1.id
			LEFT JOIN inscripcion_evento a2 ON resultados.atleta2 = a2.id;");
			
			$resultado->execute();
   
			if($resultado){
 
				$respuesta = '';
				
				foreach($resultado as $r){
					
					$valor = $this->permisos($rol_usuario); //rol del usuario
					if ($valor[0]=="true") {

						$respuesta = $respuesta."<tr>";
							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[0];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td style='display:none'>";
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

							$respuesta = $respuesta."<td style='display:none'>";
								$respuesta = $respuesta.$r[6];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td style='display:none'>";
								$respuesta = $respuesta.$r[7];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								
								if ($valor[3]=="true"){
									$respuesta = $respuesta."<button type='button' class='btn btn-danger mb-1 ' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
								}
							$respuesta = $respuesta."</td>";

						$respuesta = $respuesta."</tr>";
					}
				}
				$accion= "Ha consultado la tabla de Resultados de Eventos";
				
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

	private function existe($nombre_evento,$atleta_ganador,$atleta_perdedor, $forma_ganar,$ronda){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//se hace un try esto hace que en caso de error el programa continue por cath
		try {

			
			$resultado = $co->prepare("SELECT * from resultados where id_evento = :nombre_evento and atleta1 = :atleta_ganador and atleta2 = :atleta_perdedor and forma_ganar = :forma_ganar and ronda = :ronda");

			$resultado->bindParam(':nombre_evento',$this->nombre_evento);
			$resultado->bindParam(':atleta_ganador',$this->atleta_ganador);
			$resultado->bindParam(':atleta_perdedor',$this->atleta_perdedor);
			$resultado->bindParam(':forma_ganar',$this->forma_ganar);
			$resultado->bindParam(':ronda',$this->ronda);

			$resultado->execute();

			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				return true; 
			    
			}
			else{
				
				return false; //retorna falso en caso de que no consiga
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}
	
	public function consulta_eventos(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{
  
			$resultado = $co->prepare("SELECT DISTINCT emparejamientos.id_evento, eventos.nombre from eventos, emparejamientos where emparejamientos.id_evento = eventos.id");

			$resultado->execute();
			
			if($resultado){
 
				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r[0]. 
					">".$r[1]."</option>";
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
 
	public function consulta_atletas($evento,$ronda){

		if($this->validar_atletas($evento,$ronda)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try{

				$resultado = $co->prepare("SELECT DISTINCT i.id, i.nombre from inscripcion_evento as i, emparejamientos as e where i.id = e.atleta AND e.ronda = '$ronda' AND e.id_evento = '$evento' ");
				$resultado->execute();
				if($resultado){

					$respuesta = '';
					//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
					foreach($resultado as $r){
						$respuesta = $respuesta."<option value='' hidden='' selected='hidden'>Seleccionar Opcion</option>";
						$respuesta = $respuesta."<option value=".$r[0].">".$r[1]."</option>";
					}
					return $respuesta;
				}
				else {
					return '';
				}

			}catch(Exception $e) {
				return $e->getMessage();
			}
		}else{
			return "ingrese datos correctamente";
		}
	}

	public function consulta_rondas($evento){
		if(preg_match_all("/^[0-9\b]{1,10}$/",$evento)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try{

				$resultado = $co->prepare("SELECT DISTINCT ronda from emparejamientos where emparejamientos.id_evento = '$evento' ");

				$resultado->execute();

				if($resultado){

					$respuesta = '';
					//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
					foreach($resultado as $r){
						$respuesta = $respuesta."<option value='' hidden='' selected='hidden'>Seleccionar Opcion</option>";
						$respuesta = $respuesta."<option value=".$r['ronda'].">".$r['ronda']."</option>";
					}
					return $respuesta;
				}
				else {
					return '';
				}

			}catch(Exception $e) {
				return $e->getMessage();
			}
		}else{
			return "ingrese datos correctamente";
		}
	}

	public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '12' ");
			
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

		$this->nombre_evento = trim($this->nombre_evento);
		$this->ronda = trim($this->ronda);
		$this->atleta_ganador = trim($this->atleta_ganador);
		$this->atleta_perdedor = trim($this->atleta_perdedor);
		
		$this->forma_ganar = trim($this->forma_ganar);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->nombre_evento)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->atleta_ganador)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->atleta_perdedor)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$this->ronda)){
			return false;
		}
		else if(!preg_match_all('/^[a-zA-Z\b]{2,10}$/',$this->forma_ganar)){
			return false;
		}
		else{
			return true;
		}
	}

	public function validar_atletas($evento,$ronda){
		if(!preg_match_all('/^[0-9\b]{1,10}$/',$evento)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$ronda)){
			return false;
		}
		else{
			return true;
		}
	}

	/* ---- APP ---- */
	public function resultadosApp(){
		try{
			/*if(!$this->validarTokenApp()){
				Flight::halt(403,json_encode([
					'error' => 'Unauthorized',
					'status' => 'error'
				]));
			}*/
			
			$db = $this->conecta();
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$query = "SELECT DISTINCT
			eventos.nombre,
			eventos.id,
			a1.nombre AS nombre1,
			a2.nombre AS nombre2,
			resultados.ronda,
			resultados.forma_ganar,
			resultados.atleta1,
			resultados.atleta2,
			resultados.id
			FROM resultados
			JOIN eventos ON eventos.id = resultados.id_evento
			LEFT JOIN inscripcion_evento a1 ON resultados.atleta1 = a1.id
			LEFT JOIN inscripcion_evento a2 ON resultados.atleta2 = a2.id;";

			$stmt = $db->prepare($query);
			$stmt->execute();

			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

			Flight::json($resultados);

		}catch(Exception $e) {
			echo $e->getMessage();
		}
	}

}

?>