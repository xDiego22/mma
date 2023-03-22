<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
class reporte_cantidad_vivienda extends conexion{

	private $permiso;

    
	function set_permiso($valor){
		$this->permiso = $valor;
	}


	function get_permiso(){
		return $this->permiso;
	}
    
    
	public function cantidades(){
		
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try{
 
				$resultado_rural = $co->prepare("SELECT COUNT(zona_vivienda) as cantidad FROM informacion_socioeconomica WHERE zona_vivienda = 'Rural'");
				
				$resultado_rural->execute();
				
				$resultado_urbana = $co->prepare("SELECT COUNT(zona_vivienda) as cantidad FROM informacion_socioeconomica WHERE zona_vivienda = 'Urbana'");
				$resultado_urbana->execute();

				if($resultado_rural){
					$fila1 = $resultado_rural->fetchAll(PDO::FETCH_BOTH);
				}else{
					$fila1 = '0';
				}
				
				if($resultado_urbana){
					$fila2 = $resultado_urbana->fetchAll(PDO::FETCH_BOTH);
				}else{
					$fila2 = '0';
				}

				$data = array($fila1,$fila2);

				return json_encode($data);

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