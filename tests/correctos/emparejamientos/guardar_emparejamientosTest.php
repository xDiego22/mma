<?php 
 
use PHPUnit\Framework\TestCase;
use modelo\conexion;
use modelo\inscripcion_evento;
use modelo\emparejamiento_combates;

class guardar_emparejamientosTest extends TestCase{
    private $inscripcion;
    private $emparejamiento;
    protected static $pdo;
    
    public static function setUpBeforeClass():void {
        try {
            $host = 'mysql:host=localhost;dbname=bdmma';
            self::$pdo = new PDO($host, 'root', '');
        } catch (\Exception $e) {
            $this->markTestSkipped('MySQL: No se pudo conectar a la base de datos.');
        }
    }

    public function setUp():void{
        
        $this->inscripcion = new inscripcion_evento();
        $this->emparejamientos = new emparejamiento_combates();
        
        $this->inscripcion->set_evento_inscripcion('37');
        $this->inscripcion->set_cedula_inscripcion('12092167');
        $this->inscripcion->set_nombre_inscripcion('Raul Aguilar');
        $this->inscripcion->set_sexo_inscripcion('Masculino');
        $this->inscripcion->set_peso_inscripcion('80.3');
        $this->inscripcion->set_fechadenacimiento('1974-10-31');
        $this->inscripcion->set_estado('Lara');

        $this->inscripcion->incluir('1','29831184','10');
    }

    public function tearDown():void {
        $this->inscripcion->elimina_atletas('37','12092167','29831184','10','1'); 
    }

    public function testGuardarEmparejamiento(){
    
        $id_evento = '37';
        //id atleta ficticio recien registrado
        $id_atleta = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $json_atleta = json_encode(array($id_atleta));
        $cedula_usuario = '29831184';
        $modulo = '11';

        $this->assertEquals('Registro Guardado',$this->emparejamientos->guarda($id_evento,$json_atleta,$cedula_usuario,$modulo));
    }
}

?>