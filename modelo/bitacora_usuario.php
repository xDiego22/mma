<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class bitacora_usuario extends conexion{

    private $permiso;

    function set_permiso($valor){
		$this->permiso = $valor;
	}

    function get_permiso(){
		return $this->permiso;
	}

    public function consultar($rol_usuario){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{

			$resultado = $co->query("SELECT b.cedula_usuario, m.nombre, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y'), TIME_FORMAT(b.hora_registro, '%r'), b.accion_realizada from bitacora_usuario as b, modulos as m where m.id = b.id_modulo ORDER BY b.fecha_registro DESC, b.hora_registro DESC");

			// $resultado = $co->query("SELECT b.cedula_usuario, m.nombre, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y'), TIME_FORMAT(b.hora_registro, '%r'), b.accion_realizada from bitacora_usuario as b, modulos as m where m.id = b.id_modulo ORDER BY b.id DESC");

			//$resultado->execute();
			if($resultado){

				$respuesta = '';
				
				
				foreach($resultado as $r){
					
					$valor = $this->permisos($rol_usuario); //rol del usuario
					if ($valor[0]=="true") {
						$respuesta = $respuesta."<tr>";
                        
                            $respuesta = $respuesta."<td>";

								$respuesta = $respuesta."<table>";
									$respuesta = $respuesta."<tr>";
										$respuesta = $respuesta."<td>";
											$respuesta = $respuesta."<img src='img/bootstrap-icons/person.svg' width='30px'>";
										$respuesta = $respuesta."</td>";

										$respuesta = $respuesta."<td>";
											$respuesta = $respuesta.$r[0];
										$respuesta = $respuesta."</td>";
									$respuesta = $respuesta."</tr>";
								$respuesta = $respuesta."</table>";

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

						$respuesta = $respuesta."</tr>";
					}
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
			
			
			$resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '8' ");
			
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