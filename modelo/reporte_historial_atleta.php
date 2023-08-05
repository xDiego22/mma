<?php 
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

require_once('dompdf/vendor/autoload.php'); 
		
use Dompdf\Dompdf; 


class reporte_historial_atleta extends conexion{
    private $atleta_reporte;

    public function set_atleta_reporte($valor){
        $this->atleta_reporte = $valor;
    }

    public function generarPDF(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
 
		try{

			$resultado = $co->prepare("Select  b.nombre, (select DISTINCT a.nombre from inscripcion_evento as a, resultados as b where a.id = b.atleta1 LIMIT 1), a.ronda from resultados as a, eventos as b where a.id_evento = b.id and a.atleta1 like :atleta_reporte");

			$resultado->bindValue(':atleta_reporte','%'.$this->atleta_reporte.'%');
			
			

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

			$html = "<html><head></head><body>";
			$html = $html."<table border='1' style='width:100%'>";
			$html = $html."<caption><h3>Reporte de Historial de Atleta</h3></caption>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th>Evento</th>";
            $html = $html."<th>Atleta</th>";
			$html = $html."<th>Ronda</th>";
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";
			
 
			if($fila){
				
				foreach($fila as $f){


					$html = $html."<tr>";
					$html = $html."<td style='text-align:center'>".$f[0]."</td>";
					$html = $html."<td style='text-align:center'>".$f[1]."</td>";
                    $html = $html."<td style='text-align:center'>".$f[2]."</td>";
					$html = $html."</tr>";

					
				}
					 			
			}else{
				
			}

			$html = $html."</tbody>";
			$html = $html."</table>";
			$html = $html."</body></html>";		

		}catch(Exception $e){
			return $e->getMessage();
		}

		// Instanciamos un objeto de la clase DOMPDF.
		$pdf = new DOMPDF();
		 
		// Definimos el tamaño y orientación del papel que queremos.
		$pdf->set_paper("A4", "portrait");
		 
		// Cargamos el contenido HTML.
		$pdf->load_html(utf8_decode($html));
		 
		// Renderizamos el documento PDF.
		$pdf->render();
		 
		// Enviamos el fichero PDF al navegador.
		$pdf->stream('ReporteEventos.pdf', array("Attachment" => false));


	}

    public function consulta_atletas(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->query("Select * from inscripcion_evento");

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