 <?php 

use PHPUnit\Framework\TestCase;

use modelo\historial_atleta;

class mostrar_historial_atletaTest extends TestCase{
    private $historial;
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
        $this->historial = new historial_atleta();
    }

    public function testConsultarResultadosEventos(){
        
        $id_atleta1 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="extranjera"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $mostrar = $this->historial->mostrar_resultado($id_atleta1);
        $this->assertEquals('ingrese datos correctamente', $mostrar);

    }

}

?>