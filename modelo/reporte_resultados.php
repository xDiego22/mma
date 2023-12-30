<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;

require_once('dompdf/vendor/autoload.php'); 
use Dompdf\Dompdf; 


class reporte_resultados extends conexion{

	//atributos privados 
	private $evento_reporte_resultados;
	

	public function set_evento_reporte_resultados($valor){
		$this->evento_reporte_resultados = $valor;
	}

	
	//metodos  
 
	public function generarPDF(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
		try{

			$resultado = $co->prepare(
				"SELECT DISTINCT
				eventos.nombre,
				a1.nombre AS nombre1,
				a2.nombre AS nombre2,
				resultados.ronda,
				resultados.forma_ganar
				FROM resultados
				JOIN eventos ON eventos.id = resultados.id_evento
				LEFT JOIN inscripcion_evento a1 ON resultados.atleta1 = a1.id
				LEFT JOIN inscripcion_evento a2 ON resultados.atleta2 = a2.id
				WHERE resultados.id_evento LIKE :evento_reporte_resultados;");

			$resultado->bindValue(':evento_reporte_resultados','%'.$this->evento_reporte_resultados.'%');

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_NUM);

			$html = "<html><head></head><body>";
			$html = $html."<table border='1' style='width:100%'>";
			$html = $html."<caption><h3>Reporte de Resultados</h3></caption>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th>Evento</th>";
			$html = $html."<th>Atleta Ganador</th>";
			$html = $html."<th>Atleta Perdedor</th>";
			$html = $html."<th>Ronda</th>";
			$html = $html."<th>Forma de Ganar</th>";
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";

 
			if($fila){
				
				foreach($fila as $f){

					
					$html = $html."<tr>";
					$html = $html."<td style='text-align:center'>".$f[0]."</td>";
					$html = $html."<td style='text-align:center'>".$f[1]."</td>";
					$html = $html."<td style='text-align:center'>".$f[2]."</td>";
					$html = $html."<td style='text-align:center'>".$f[3]."</td>";
					$html = $html."<td style='text-align:center'>".$f[4]."</td>";
					
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
		$pdf->stream('ReporteResultados.pdf', array("Attachment" => false));


	}
	   
	public function consulta_eventos(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->query("Select * from eventos");

			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id'].">".$r['nombre']."</option>";
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
 
	public function consulta_atletas(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{
 
			$resultado = $co->query("Select * from atletas");

			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['nombre'].">".$r['cedula']."--".$r['nombre']." ".$r['apellido']."</option>";
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