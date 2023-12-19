<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
class emparejamiento_combates extends conexion{

	private $permiso;

    function set_permiso($valor){
		$this->permiso = $valor;
	}

	function get_permiso(){
		return $this->permiso;
	}

	public function consulta_eventos(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT DISTINCT inscripcion_evento.id_evento, eventos.nombre from eventos, inscripcion_evento where inscripcion_evento.id_evento = eventos.id");

			$resultado->execute();
			
			if($resultado){

				$respuesta = '';
				
				foreach($resultado as $r){
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
	}

	public function coincidentes($evento,$sexo,$edad,$peso,$orden,$cedula_bitacora,$modulo){

		if($this->validar_coincidientes($evento,$sexo,$edad,$peso,$orden)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try{
				if($sexo==""){
					$cadena_sexo = "";
				}
				else{
					$cadena_sexo = " and sexo = '$sexo'";
				}
				
					$cadena_edad = "";
				
				
					if($edad=="4"){
						$cadena_edad = " and TIMESTAMPDIFF(YEAR,fechadenacimiento,CURDATE()) >= 21";
					}
					elseif($edad=="1"){
						$cadena_edad = " and TIMESTAMPDIFF(YEAR,fechadenacimiento,CURDATE()) 
						BETWEEN 11 and 13"; 
					}
					elseif($edad=="2"){
						$cadena_edad = " and TIMESTAMPDIFF(YEAR,fechadenacimiento,CURDATE()) 
						BETWEEN 14 and 16"; 
					}
					elseif($edad=="3"){
						$cadena_edad = " and TIMESTAMPDIFF(YEAR,fechadenacimiento,CURDATE()) 
						BETWEEN 17 and 20"; 
					}
					
					
					$cadena_peso = "";
				
				
					if($peso=="4"){
						
						
						if($edad=="4"){
							$cadena_peso = " and peso BETWEEN 81 and 90";
						}
						elseif($edad=="1"){
							$cadena_peso = " and peso > 41";
						}
						elseif($edad=="2"){
							$cadena_peso = " and peso > 75";
						}
						elseif($edad=="3"){
							$cadena_peso = " and peso BETWEEN 75 and 82";
						}
					}
					elseif($peso=="1"){
						if($edad=="4"){
							$cadena_peso = " and peso BETWEEN 55 and 60";
						}
						elseif($edad=="1"){
							$cadena_peso = " and peso BETWEEN 0 and 27";
						}
						elseif($edad=="2"){
							$cadena_peso = " and peso BETWEEN 55 and 60";
						}
						elseif($edad=="3"){
							$cadena_peso = " and peso BETWEEN 55 and 60";
						}
					}
					elseif($peso=="2"){
						if($edad=="4"){
							$cadena_peso = " and peso BETWEEN 61 and 70";
						}
						elseif($edad=="1"){
							$cadena_peso = " and peso BETWEEN 28 and 35";
						}
						elseif($edad=="2"){
							$cadena_peso = " and peso BETWEEN 61 and 66";
						}
						elseif($edad=="3"){
							$cadena_peso = " and peso BETWEEN 61 and 66";
						}
					}
					elseif($peso=="3"){
						if($edad=="4"){
							$cadena_peso = " and peso BETWEEN 71 and 80";
						}
						elseif($edad=="1"){
							$cadena_peso = " and peso BETWEEN 36 and 41";
						}
						elseif($edad=="2"){
							$cadena_peso = " and peso BETWEEN 67 and 74";
						}
						elseif($edad=="3"){
							$cadena_peso = " and peso BETWEEN 67 and 74";
						}
					}
					elseif($peso=="5"){
						if($edad=="4"){
							$cadena_peso = " and peso > 90";
						}
						elseif($edad=="3"){
							$cadena_peso = " and peso > 82";
						}
					}
				
				$resultado = $co->prepare("SELECT id, cedula, nombre, sexo, 
				TIMESTAMPDIFF(YEAR,fechadenacimiento,CURDATE()) as edad, 
				peso from inscripcion_evento 
				WHERE id_evento = '$evento' ".$cadena_sexo." ".
				$cadena_edad." ".$cadena_peso." "."order by $orden");
				
				$resultado->execute();
				

				if($resultado){
					
					$respuesta = '';
					$iterador = 1;
					foreach($resultado as $r){
						$respuesta = $respuesta."<tr id='fila$iterador'>";
							$respuesta = $respuesta."<td style='display:none'>";
								$respuesta = $respuesta.$r[0];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								$timestamp = floor(microtime(true)*1000);
								if(is_file("img/atletas/".$r[1].".png")){
									$foto = 	"img/atletas/".$r[1].".png?{$timestamp}";
								}
								else{
									$foto = "img/atletas/icono_persona.png?{$timestamp}";	
								}
								$respuesta = $respuesta."
								<img src='".$foto."' style='width:55px' 
								class='rounded-circle' />";
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

						$respuesta = $respuesta."</tr>";
						$iterador++;
					}

					$accion= "Ha solicitado coincidientes para el evento";
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
	}

	
	public function guarda($evento,$atleta,$cedula_bitacora,$modulo){
		$at1 = json_decode($atleta);
		if (preg_match_all('/^[0-9\b]{1,10}$/',$evento)){	
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			try {
				//primero eliminamos toda la informacion
				//que coincida con sexo, edad y peso
				//porque se reemplazara con la que se envia
				
				$er = $co->prepare("DELETE from emparejamientos where
					id_evento = :evento 
					");	
				$er->bindParam(':evento',$evento);
				$er->execute();	
			
				//luego recorremos los arreglos enviados para guardalos en la base
				//de datos
				
				for($i=0;$i<count($at1);$i++){
					
					
					$ronda =  1;
					$r=$co->prepare("INSERT into emparejamientos(
						atleta,
						id_evento,
						ronda)
						Values(
						:atleta,
						:id_evento,
						:ronda)");
						$r->bindParam(':atleta',$at1[$i]);
						$r->bindParam(':id_evento',$evento);
						$r->bindParam(':ronda',$ronda);
						$r->execute();	
				}

				$accion= "Ha guardado busqueda de coincidientes";

				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
				return "Registro Guardado";
				
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}else{
			return 'ingrese datos correctamente';
		}
	}

	public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '11' ");
			
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

	public function ganador_ronda($evento,$atleta,$ronda,$cedula_bitacora,$modulo){
		
		if ($this->validar_ganador($evento,$atleta,$ronda)){

			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			try {

				$sql = 'INSERT INTO emparejamientos (id_evento, atleta, ronda) VALUES(:evento_id,:atleta,:ronda)';

				$resultado = $co->prepare($sql);

				$resultado->bindParam(':evento_id',$evento);
				$resultado->bindParam(':atleta',$atleta);
				$resultado->bindParam(':ronda',$ronda);
				$resultado->execute();

				$accion= "Ha guardado ganadores de ronda";

				parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

				return "";

			} catch (Exception $e) {
				return $e->getMessage();
			}
			
		}else{
			return "ingrese datos correctamente";
		}
	}

	public function validar_coincidientes($evento,$sexo,$edad,$peso,$orden){
		
		$orden = trim($orden);

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$evento)){
			return false;
		}
		else if (!preg_match_all('/^[a-zA-Z\b]{0,10}$/',$sexo)){
			return false;
		}
		else if (!preg_match_all('/^[a-zA-Z0-9\b]{0,10}$/',$edad)){
			return false;
		}
		else if (!preg_match_all('/^[a-zA-Z0-9\b]{0,10}$/',$peso)){
			return false;
		}
		else if (!preg_match_all('/^[A-Za-z ]{4,14}$/',$orden)){
			return false;
		}
		else{
			return true;
		}
	}

	public function validar_ganador($evento,$atleta,$ronda){

		if(!preg_match_all('/^[0-9\b]{1,10}$/',$evento)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$atleta)){
			return false;
		}
		else if(!preg_match_all('/^[0-9\b]{1,10}$/',$ronda)){
			return false;
		}
		else{
			return true;
		}
	}

} 
?>