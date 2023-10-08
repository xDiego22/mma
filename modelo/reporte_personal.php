<?php  

namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
require_once('dompdf/vendor/autoload.php'); 
		
use Dompdf\Dompdf; 



class reporte_personal extends conexion{

	//atributos privados 
	private $club_reporte_personal;
	private $cedula_reporte_personal;
	private $nombres_reporte_personal;
	private $apellidos_reporte_personal;
	private $cargo_reporte_personal;

	public function set_club_reporte_personal($valor){
		$this->club_reporte_personal = $valor;
	}

	public function set_cedula_reporte_personal($valor){
		$this->cedula_reporte_personal = $valor;
	}

	public function set_nombres_reporte_personal($valor){
		$this->nombres_reporte_personal = $valor;
	}

	public function set_apellidos_reporte_personal($valor){
		$this->apellidos_reporte_personal = $valor;
	} 

	public function set_cargo_reporte_personal($valor){
		$this->cargo_reporte_personal = $valor;
	} 

	
	//metodos  
 
	public function generarPDF(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
		try{
			
			$resultado = $co->prepare("Select clubes.nombre, 
			personal.cedula, personal.nombre, 
			personal.apellido, personal.telefono, 
			personal.cargo, personal.direccion 
			from clubes, personal 
			where clubes.id = personal.id_club and 
			clubes.id like :club_reporte_personal 
			and personal.cedula like :cedula_reporte_personal 
			and personal.nombre like :nombres_reporte_personal 
			and personal.apellido like :apellidos_reporte_personal 
			and personal.cargo like :cargo_reporte_personal");

			$resultado->bindValue(':club_reporte_personal','%'.$this->club_reporte_personal.'%');
			$resultado->bindValue(':cedula_reporte_personal','%'.$this->cedula_reporte_personal.'%');
			$resultado->bindValue(':nombres_reporte_personal','%'.$this->nombres_reporte_personal.'%');
			$resultado->bindValue(':apellidos_reporte_personal','%'.$this->apellidos_reporte_personal.'%');
			$resultado->bindValue(':cargo_reporte_personal','%'.$this->cargo_reporte_personal.'%');

			$resultado->execute();



			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

			

			$html = "<html><head></head><body>";
			$html = $html."<table border='1' style='width:100%'>";
			$html = $html."<caption><h3>Reporte de Personal</h3></caption>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th>Club</th>";
			$html = $html."<th>Cedula</th>";
			$html = $html."<th>Nombre</th>";
			$html = $html."<th>Apellido</th>";
			$html = $html."<th>Telefono</th>";
			$html = $html."<th>Cargo</th>";
			$html = $html."<th>Direccion</th>";
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";

 
			if($fila){
				
				foreach($fila as $f){

					
					$html = $html."<tr >";
					$html = $html."<td style='text-align:center'>".$f['0']."</td>";
					$html = $html."<td style='text-align:center'>".$f['1']."</td>";
					$html = $html."<td style='text-align:center'>".$f['2']."</td>";
					$html = $html."<td style='text-align:center'>".$f['3']."</td>";
					$html = $html."<td style='text-align:center'>".$f['4']."</td>";
					$html = $html."<td style='text-align:center'>".$f['5']."</td>";
					$html = $html."<td style='text-align:center'>".parent::desencriptar($f['6'])."</td>";
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
		$pdf->stream('ReportePersonal.pdf', array("Attachment" => false));


	}
	 
	public function consulta_clubes(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{

			$resultado = $co->query("Select * from clubes");

			if($resultado){

				$respuesta = '';
				//ciclo foreach se usa casi siempre para recorrer los resultados de las consultas
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=".$r['id']. 
					">".$r['nombre']."</option>";
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