<?php  
namespace modelo;
use modelo\conexion as conexion;
use PDO;
use Exception;
require_once('dompdf/vendor/autoload.php'); 
		
use Dompdf\Dompdf; 
  


class reporte_atleta extends conexion{

	//atributos privados
	private $club_reporte_atleta;
	private $cedula_reporte_atleta;
	private $nombres_reporte_atleta;
	private $apellidos_reporte_atleta;
	private $fecha_reporte_atleta;
	private $sexo_reporte_atleta;
	private $deporte_reporte_atleta;
	private $categoria_reporte_atleta;

	public function set_club_reporte_atleta($valor){
		$this->club_reporte_atleta = $valor;
	}
  
	public function set_cedula_reporte_atleta($valor){
		$this->cedula_reporte_atleta = $valor;
	}

	public function set_nombres_reporte_atleta($valor){
		$this->nombres_reporte_atleta = $valor;
	}
	public function set_apellidos_reporte_atleta($valor){
		$this->apellidos_reporte_atleta = $valor;
	}
	public function set_fecha_reporte_atleta($valor){
		$this->fecha_reporte_atleta = $valor;
	}
	public function set_sexo_reporte_atleta($valor){
		$this->sexo_reporte_atleta = $valor;
	}
	public function set_deporte_reporte_atleta($valor){
		$this->deporte_reporte_atleta = $valor;
	}
	public function set_categoria_reporte_atleta($valor){
		$this->categoria_reporte_atleta = $valor;
	}

	public function generarPDF(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try{
			
			$resultado = $co->prepare("SELECT a.nombre, 
			b.cedula, CONCAT(b.nombre, ' ',b.apellido ),
			b.peso, 
			b.estatura, 
			b.fechadenacimiento,
			TIMESTAMPDIFF(YEAR,b.fechadenacimiento,CURDATE()) as edad, 
			b.telefono, b.sexo, 
			b.deportebase, b.categoria, 
			b.entrenador from clubes as a, atletas as b where 
			a.id = b.id_club 
			and a.id like :club_reporte_atleta 
			and b.cedula like :cedula_reporte_atleta 
			and b.nombre like :nombres_reporte_atleta 
			and b.apellido like :apellidos_reporte_atleta 
			and b.fechadenacimiento like :fecha_reporte_atleta 
			and b.sexo like :sexo_reporte_atleta 
			and b.deportebase like :deporte_reporte_atleta 
			and b.categoria like :categoria_reporte_atleta");

			$resultado->bindValue(':club_reporte_atleta','%'.$this->club_reporte_atleta.'%');

			$resultado->bindValue(':cedula_reporte_atleta','%'.$this->cedula_reporte_atleta.'%');

			$resultado->bindValue(':nombres_reporte_atleta','%'.$this->nombres_reporte_atleta.'%');

			$resultado->bindValue(':apellidos_reporte_atleta','%'.$this->apellidos_reporte_atleta.'%');

			$resultado->bindValue(':fecha_reporte_atleta','%'.$this->fecha_reporte_atleta.'%');

			$resultado->bindValue(':sexo_reporte_atleta','%'.$this->sexo_reporte_atleta.'%');

			$resultado->bindValue(':deporte_reporte_atleta','%'.$this->deporte_reporte_atleta.'%');

			$resultado->bindValue(':categoria_reporte_atleta','%'.$this->categoria_reporte_atleta.'%');
			

			$resultado->execute();

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);

			$html = "<html><head></head><body>";
			$html = $html."<table border='1' style='width:100%;'>";
			$html = $html."<caption><h3>Reporte de Atletas</h3></caption>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th>Club</th>";
			$html = $html."<th>C.I</th>";
			$html = $html."<th>Nombre</th>";
			$html = $html."<th>Peso</th>";
			$html = $html."<th>Estatura</th>";
			$html = $html."<th>F.N</th>";
			$html = $html."<th>Edad</th>";
			$html = $html."<th>Tlf</th>";
			$html = $html."<th>Sexo</th>";
			$html = $html."<th>Deporte</th>";
			$html = $html."<th>Categoria</th>";
			$html = $html."<th>Entrenador</th>";
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";

			if($fila){
				
				foreach($fila as $f){

					
					$html = $html."<tr>";
					$html = $html."<td style='text-align:center'>".$f[0]."</td>";
					$html = $html."<td style='text-align:center'>".$f[1]."</td>";
					$html = $html."<td style='text-align:center'>".$f[2]."</td>";
					$html = $html."<td style='text-align:center'>".$f[3]." Kg"."</td>";
					$html = $html."<td style='text-align:center'>".$f[4]." Cm"."</td>";
					$html = $html."<td style='text-align:center'>".$f[5]."</td>";
					$html = $html."<td style='text-align:center'>".$f[6]." Anos"."</td>";
					$html = $html."<td style='text-align:center'>".$f[7]."</td>";
					$html = $html."<td style='text-align:center'>".$f[8]."</td>";
					$html = $html."<td style='text-align:center'>".$f[9]."</td>";
					$html = $html."<td style='text-align:center'>".$f[10]."</td>";
					$html = $html."<td style='text-align:center'>".$f[11]."</td>";
					
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
		$pdf->set_paper("A4", "landscape");
		
		// Cargamos el contenido HTML.
		$pdf->load_html(utf8_decode($html));
		
		// Renderizamos el documento PDF.
		$pdf->render();
		
		// Enviamos el fichero PDF al navegador.
		$pdf->stream('ReporteAtletas.pdf', array("Attachment" => false));
		

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