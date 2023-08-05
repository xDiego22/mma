 <?php 

use PHPUnit\Framework\TestCase;

use modelo\resultados_eventos;

class registrar_resultados_eventosTest extends TestCase{
    private $resultados;
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
        
        $this->resultados = new resultados_eventos();
    }

    public function testRegistrarResultadosEventos(){

        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="218391?¡?¡"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta1 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="colombiana"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta2 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="peru"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->resultados->set_nombre_evento($id_evento);
        $this->resultados->set_atleta_ganador($id_atleta1);
        $this->resultados->set_atleta_perdedor($id_atleta2); 
        $this->resultados->set_ronda('a');
        $this->resultados->set_forma_ganar('21321');
        
        $registrar = $this->resultados->registrar('1','29831184','12');

        $this->assertEquals('ingrese datos correctamente', $registrar);
    }

}

?>