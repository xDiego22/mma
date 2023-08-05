<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
class historial_atleta extends conexion{

    public function mostrar_resultado($atleta){
		if(preg_match_all('/^[0-9\b]{1,10}$/',$atleta)){	
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try{

				$resultado = $co->prepare("SELECT b.nombre, GROUP_CONCAT(' ', a.ronda)from resultados as a, eventos as b where a.id_evento = b.id and a.atleta1 = '$atleta'");

				$resultado->execute();

				if($resultado){

					$respuesta = '';
					//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
					foreach($resultado as $r){ 
						$respuesta = $respuesta."<tr>";
								
							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[0];
							$respuesta = $respuesta."</td>";

							$respuesta = $respuesta."<td>";
								$respuesta = $respuesta.$r[1];
							$respuesta = $respuesta."</td>";


						$respuesta = $respuesta."</tr>";
					}
					return $respuesta;
				}
				else {
					return 'vacio';
				}

			}catch(Exception $e) {
				return $e->getMessage();
			}
		}else{
			return 'ingrese datos correctamente';
		}
	}
    public function consulta_atletas(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->prepare("SELECT DISTINCT id, cedula, nombre from inscripcion_evento WHERE id_evento GROUP BY cedula");
			$resultado->execute();
			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id'].">".$r['cedula']." -- ".$r['nombre']."</option>";
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
}
?>