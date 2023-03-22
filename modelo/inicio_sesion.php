<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class inicio_sesion extends conexion{
  
	private $cedula_inicio;
	private $contrasena_inicio;
	private $fila_cedula;
	private $rol;
 
	public function set_cedula_inicio($valor){
		$this->cedula_inicio = $valor;
	}

	public function set_contrasena_inicio($valor){
		$this->contrasena_inicio = $valor;
	}

	public function set_rol($valor){
		$this->rol = $valor;
	}

	public function get_cedula_inicio(){
		return $this->cedula_inicio;
	}
	
	public function get_contrasena_inicio(){
		return $this->contrasena_inicio;
	}

	public function get_rol(){
		return $this->rol;
	}


	//metodos  

	public function busca_cedula(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
			 
			$resultado = $co->prepare("SELECT usuarios.cedula from usuarios where cedula = :cedula_inicio");
			 
			$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
			
			$resultado->execute();
			 
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){
				$this->fila_cedula=$fila[0][0];
				return $fila[0][0];
			}
			else{
				
				return "";
			}
			
			}catch(Exception $e){
			return $e->getMessage();
			}
		}else{
			return "ingrese cedula correctamente";
		}
	}

	/*metodo nuevo*/
	public function busca_nombre(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
				
				$resultado = $co->prepare("SELECT  usuarios.nombre from usuarios where cedula = :cedula_inicio");
				
				$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
				
				$resultado->execute();
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				if($fila){
					return $fila[0][0];
				}
				else{
					
					return "Error en datos ingresados";
				}
				
			}catch(Exception $e){
				return $e->getMessage();
			}
		}else{
			return "ingrese cedula correctamente";
		}
	}


	public function busca_contrasena(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){
			try{
				
				$resultado = $co->prepare("SELECT  usuarios.contrasena from usuarios where cedula = :cedula_inicio");
				
				$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
				
				$resultado->execute();
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				if($fila){
					return $fila[0][0];
				}
				else{
					
					return "Error en datos ingresados";
				}
				
			}catch(Exception $e){
				return $e->getMessage();
			}

		}else{
			return "ingrese cedula correctamente";
		}
	}

	public function busca_id_rol(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all('/^[0-9]{7,8}$/',$this->cedula_inicio) ){	
			try{
				
				$resultado = $co->prepare("SELECT usuarios.id_rol from usuarios where usuarios.cedula = :cedula_inicio");
				
				$resultado->bindParam(':cedula_inicio',$this->fila_cedula);
				
				$resultado->execute();
				
				
				$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
				
				if($fila){
					
					return $fila[0][0];
				
				}
				else{
					return "";
				}
				
			}catch(Exception $e){
				return $e->getMessage();
			}
		}else{
			return "ingrese cedula correctamente";
		}
	}

	public function busca_modulo(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->prepare("SELECT intermediaria.id_modulos from intermediaria where intermediaria.id_rol = :rol");
			
			$resultado->bindParam(':rol',$this->rol);
			
			$resultado->execute();
			
			
			$respuesta_modulo=[];
			$i=0;

			foreach($resultado as $r){

				$respuesta_modulo[$i] = $r['id_modulos'];
				
				$i++;
			}
			
			if(!empty($respuesta_modulo)){
			
				return $respuesta_modulo;

			}else{
				return "";
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

}

?>