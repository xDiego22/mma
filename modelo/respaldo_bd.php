<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

class respaldo_bd extends conexion{

	private $ip = DB_HOST;
    private $bd = DB_NAME;
    private $usuario = DB_USER;
    private $contrasena = DB_PASSWORD;

	private $restorePoint;

    private $permiso;

    public function set_permiso($valor){
		$this->permiso = $valor;
	}

	public function set_restorePoint($valor){
		$this->restorePoint = $valor;
	}

    public function get_permiso(){
		return $this->permiso;
	}
    public function get_restorePoint(){
		return $this->restorePoint;
	}

	public function backup (){
		try {

				$bd = $this->conecta();
				$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				date_default_timezone_set('America/Caracas');
			
				$fecha = date("d_m_Y");
				$hora = date("h-i-sa");
				$tablas = array();

				// Obtener la lista de tablas
				$sql = 'SHOW TABLES';
				$resultado = $bd->query($sql);
				if ($resultado) {
					$tablas = $resultado->fetchAll(PDO::FETCH_COLUMN);
				} else {
					return 'Ocurrió un error inesperado al obtener la lista de tablas';
				}

				// Generar el archivo de respaldo
				$sql = 'SET FOREIGN_KEY_CHECKS=0;' . "\n\n";
				$sql .= 'CREATE DATABASE IF NOT EXISTS ' . $this->bd . ";\n\n";
				$sql .= 'USE ' . $this->bd . ";\n\n";//
				foreach ($tablas as $tabla) {
					// Obtener la estructura de la tabla
					$resultado = $bd->query('SHOW CREATE TABLE ' . $tabla);
					$row2 = $resultado->fetch(PDO::FETCH_NUM);
					$sql .= "DROP TABLE IF EXISTS $tabla;";
					$sql .= "\n\n" . $row2[1] . ";\n\n";

					// Obtener los datos de la tabla
					$resultado = $bd->query('SELECT * FROM ' . $tabla);
					if ($resultado) {
						$numFields = $resultado->columnCount();
						while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
							$sql .= "INSERT INTO $tabla VALUES(";
							foreach ($row as $key => $value) {
								$value = addslashes($value);
								$value = str_replace("\n", "\\n", $value);
								if (isset($value)) {
									$sql .= '"' . $value . '"';
								} else {
									$sql .= '""';
								}
								if ($key !== array_key_last($row)) {
									$sql .= ',';
								}
							}
							$sql .= ");\n";
						}
						$sql .= "\n\n\n";
					} else {
						return 'Ocurrió un error inesperado al obtener los datos de la tabla ' . $tabla;
					}
				}
				$sql .= 'SET FOREIGN_KEY_CHECKS=1;';

				// Guardar el archivo de respaldo

				$rutaArchivo = 'backup/' . $this->bd. "_" . $fecha . "_(".$hora.")" . ".sql";

				if (file_put_contents($rutaArchivo, $sql)) {
					return 'Copia de seguridad realizada con éxito';
				} else {
					return 'Ocurrió un error inesperado al crear la copia de seguridad';
				}
		}  catch (Exception $e) {
			return "Error: " . $e->getMessage();
		}
	}

	public function restore(){
		try {

			if(preg_match_all('/^[\w()-.]{20,50}$/',$this->restorePoint)){

				$bd = $this->conecta();
				$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$restorePoint = "backup/".$this->limpiarCadena($this->restorePoint);
				$sql = explode(";", file_get_contents($restorePoint));
				$totalErrors = 0;
	
				set_time_limit(60);
	
	
				$bd->exec("SET FOREIGN_KEY_CHECKS=0");
	
				for ($i = 0; $i < (count($sql) - 1); $i++) {
					try {
						$bd->exec($sql[$i] . ";");
					} catch (PDOException $e) {
						$totalErrors++;
					}
				}
	
				$bd->exec("SET FOREIGN_KEY_CHECKS=1");
	
				if ($totalErrors <= 0) {
					http_response_code(200);
					return "Restauración completada con éxito";
				} else {
					http_response_code(500);
					return "Ocurrió un error inesperado, no se pudo hacer la restauración completamente";
				}
			}else{
				http_response_code(400);
				return 'Error: Datos invalidos';
			}
		
		} catch (Exception $e) {
			http_response_code(500);
			return "Error: " . $e->getMessage();
		}
	}

	public function eliminarRestorePoint(){
		try {

			if(preg_match_all('/^[\w()-.]{20,50}$/',$this->restorePoint)){

				$restorePoint = "backup/".$this->limpiarCadena($this->restorePoint);
				
				if(is_file($restorePoint)){

					unlink($restorePoint);

					http_response_code(200);
					return "Eliminado correctamente";
				}else {
					http_response_code(400);
					return "Error: No existe este punto de restauracion";
				}
	
			}else{
				http_response_code(400);
				return 'Error: Datos invalidos';
			}
		
		} catch (Exception $e) {
			http_response_code(500);
			return "Error: " . $e->getMessage();
		}
	}

    public function permisos($rol){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(preg_match_all("/^[0-9]{1,10}$/",$rol)){
			try{
				
				
				$stmt = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '15' ");
				
				$stmt->bindParam(':rol',$rol);
				$stmt->execute();
				
				$consultar="";
				$registrar="";
				$modificar="";
				$eliminar="";
				
				foreach($stmt as $r){
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

	public function limpiarCadena($valor) {
        $valor=addslashes($valor);
        $valor = str_ireplace("<script>", "", $valor);
        $valor = str_ireplace("</script>", "", $valor);
        $valor = str_ireplace("SELECT * FROM", "", $valor);
        $valor = str_ireplace("DELETE FROM", "", $valor);
        $valor = str_ireplace("UPDATE", "", $valor);
        $valor = str_ireplace("INSERT INTO", "", $valor);
        $valor = str_ireplace("DROP TABLE", "", $valor);
        $valor = str_ireplace("TRUNCATE TABLE", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("\\", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        return $valor;
    }
}

?>