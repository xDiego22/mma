<?php 

use PHPUnit\Framework\TestCase;

use modelo\inscripcion_evento;

class eliminar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;
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
    }

    public function testEliminarInscripcionEvento(){
    
        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="123801283¡¡?¡?¡?"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->assertEquals('ingrese datos correctamente',$this->inscripcion->elimina_atletas($id_evento,'12092167','29831184','10'));
    }
}

?>