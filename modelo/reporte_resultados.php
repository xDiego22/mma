<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
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
			
			/*$resultado = $co->prepare("Select b.nombre,
			(select a.nombre from inscripcion_evento as a, resultados as b where a.id = b.atleta1) as nombre1,
			(select a.nombre from inscripcion_evento as a, resultados as b where a.id = b.atleta2) as nombre2,
			a.ronda, a.forma_ganar 
			from resultados as a, eventos as b where a.id_evento like :evento_reporte_resultados");*/

			$resultado = $co->prepare("SELECT b.nombre, 
			(select a.nombre from inscripcion_evento as a, resultados as b where a.id = b.atleta1 LIMIT 1) as nombre1, 
			(select a.nombre from inscripcion_evento as a, resultados as b where a.id = b.atleta2 LIMIT 1) as nombre2,
			a.ronda, a.forma_ganar 
			from resultados as a, eventos as b where a.id_evento like :evento_reporte_resultados and b.id = a.id_evento");

			$resultado->bindValue(':evento_reporte_resultados','%'.$this->evento_reporte_resultados.'%');

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

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