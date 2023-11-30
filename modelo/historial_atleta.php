<?php
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

use flight;

class historial_atleta extends conexion {

    public function mostrar_resultado($atleta) {
        if (preg_match_all('/^[0-9\b]{1,10}$/', $atleta)) {
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $resultado = $co->prepare("SELECT b.nombre, GROUP_CONCAT(' ', a.ronda) FROM resultados as a, eventos as b WHERE a.id_evento = b.id AND a.atleta1 = '$atleta'");
                $resultado->execute();

                if ($resultado) {
                    $respuesta = '';
                    // Ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
                    foreach ($resultado as $r) {
                        $respuesta .= "<tr>";
                        $respuesta .= "<td>" . $r[0] . "</td>";
                        $respuesta .= "<td>" . $r[1] . "</td>";
                        $respuesta .= "</tr>";
                    }
                    return $respuesta;
                } else {
                    return 'vacio';
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return 'ingrese datos correctamente';
        }
    }

    public function consulta_atletas() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $resultado = $co->prepare("SELECT DISTINCT id, cedula, nombre FROM inscripcion_evento WHERE id_evento GROUP BY cedula");
            $resultado->execute();

            if ($resultado) {
                $respuesta = '';
                // Ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
                foreach ($resultado as $r) {
                    $respuesta .= "<option value=" . $r['id'] . ">" . $r['cedula'] . " -- " . $r['nombre'] . "</option>";
                }
                return $respuesta;
            } else {
                return '';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /* ---- APP ---- */

    public function consultaApp() {
        try {

            if(!$this->validarTokenApp()){
				Flight::halt(403,json_encode([
					'error' => 'Unauthorized',
					'status' => 'error'
				]));
			}

            $db = $this->conecta();
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT DISTINCT id, cedula, nombre FROM inscripcion_evento GROUP BY cedula;";

            $stmt = $db->prepare($query);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function mostrarApp($atleta) {
        try {

            if(!$this->validarTokenApp()){
				Flight::halt(403,json_encode([
					'error' => 'Unauthorized',
					'status' => 'error'
				]));
			}

            $db = $this->conecta();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $query = "SELECT e.nombre AS nombre_evento, GROUP_CONCAT(' ', r.ronda) AS resultado_ronda
            FROM resultados AS r
            LEFT JOIN eventos AS e ON r.id_evento = e.id 
            WHERE r.atleta1 = :atletaid
            GROUP BY e.id
            ";
    
            $stmt = $db->prepare($query);
            $stmt->bindParam(':atletaid', $atleta, PDO::PARAM_INT);
            $stmt->execute();
    
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            Flight::json($resultados);
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
}
?>
