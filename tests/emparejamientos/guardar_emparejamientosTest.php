<?php 
 
use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\emparejamiento_combates;

class guardar_emparejamientosTest extends TestCase{
    private $eventos;
    private $clubes;
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
        
        $this->emparejamientos = new emparejamiento_combates();
    }

    public function testGuardarEmparejamiento(){
    
        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="12038210"')->fetch(\PDO::FETCH_ASSOC)['id'];
        
        $id_atleta = self::$pdo->query('SELECT id from inscripcion_evento where cedula="extranjera"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $json_atleta = json_encode(array($id_atleta));

        $this->assertEquals('ingrese datos correctamente',$this->emparejamientos->guarda($id_evento,$json_atleta,'29831184','11'));
    }
}

?>