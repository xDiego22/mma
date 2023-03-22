<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
  
class reporte_cantidad_participantes extends conexion{

    private $evento;

	private $permiso;

    public function set_evento($valor){
		$this->evento = $valor;
	}
	function set_permiso($valor){
		$this->permiso = $valor;
	}


	function get_permiso(){
		return $this->permiso;
	}
    function get_evento(){
		return $this->evento;
	}
    
	public function cantidades(){
		if(preg_match_all("/^[0-9\b]{1,10}$/",$this->evento)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try{
 
				$resultado_masculino = $co->prepare("SELECT COUNT(sexo) as cantidad FROM inscripcion_evento WHERE inscripcion_evento.id_evento = :evento AND sexo = 'Masculino'");

				$resultado_masculino->bindParam(':evento',$this->evento);
				$resultado_masculino->execute();
				

				$resultado_femenino = $co->prepare("SELECT COUNT(sexo) as cantidad FROM inscripcion_evento WHERE inscripcion_evento.id_evento = :evento AND sexo = 'Femenino'");

				$resultado_femenino->bindParam(':evento',$this->evento);
				$resultado_femenino->execute();

				if($resultado_masculino){
					$fila1 = $resultado_masculino->fetchAll(PDO::FETCH_BOTH);
				}else{
					$fila1 = '0';
				}
				
				if($resultado_femenino){
					$fila2 = $resultado_femenino->fetchAll(PDO::FETCH_BOTH);
				}else{
					$fila2 = '0';
				}

				$data = array($fila1,$fila2);

				return json_encode($data);

			}catch(Exception $e) {
				return $e->getMessage();
			}
		}
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

	public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '21' ");
			
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

}

?>