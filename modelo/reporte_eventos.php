<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
require_once('dompdf/vendor/autoload.php'); 
		
use Dompdf\Dompdf; 


class reporte_eventos extends conexion{

	//atributos privados
	
	private $nombre_reporte_evento;
	private $fecha_reporte_evento;
	

	public function set_nombre_reporte_evento($valor){
		$this->nombre_reporte_evento = $valor;
	}

	public function set_fecha_reporte_evento($valor){
		$this->fecha_reporte_evento = $valor;
	}
	//metodos  
 
	public function generarPDF(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
 
		try{

			$resultado = $co->prepare("SELECT * from eventos where nombre like :nombre_reporte_evento and fecha like :fecha_reporte_evento");

			$resultado->bindValue(':nombre_reporte_evento','%'.$this->nombre_reporte_evento.'%');
			$resultado->bindValue(':fecha_reporte_evento','%'.$this->fecha_reporte_evento.'%');
			

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

			$html = "<html>";
			$html = $html."<head></head><body>";
			$html = $html."<table border='1' style='width:100%'>";
			$html = $html."<caption><h3>Reporte de Eventos</h3></caption>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th>Nombre</th>";
			$html = $html."<th>Fecha</th>";
			$html = $html."<th>Hora</th>";
			$html = $html."<th>Monto</th>";
			$html = $html."<th>Direccion</th>";
			$html = $html."<th>Nombre Juez 1</th>";
			$html = $html."<th>Nombre Juez 2</th>";
			$html = $html."<th>Nombre Juez 3</th>";
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";
			
 
			if($fila){
				
				foreach($fila as $f){


					$html = $html."<tr>";
					$html = $html."<td style='text-align:center'>".$f['nombre']."</td>";
					$html = $html."<td style='text-align:center'>".$f['fecha']."</td>";
					$html = $html."<td style='text-align:center'>".$f['hora']."</td>";
					$html = $html."<td style='text-align:center'>".$f['monto']."</td>";
					$html = $html."<td style='text-align:center'>".$f['direccion']."</td>";
					$html = $html."<td style='text-align:center'>".$f['juez1']."</td>";
					$html = $html."<td style='text-align:center'>".$f['juez2']."</td>";
					$html = $html."<td style='text-align:center'>".$f['juez3']."</td>";
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
	

}

?>