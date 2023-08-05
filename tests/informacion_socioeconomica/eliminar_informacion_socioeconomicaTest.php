 <?php 

use PHPUnit\Framework\TestCase;

use modelo\socioeconomico_atleta;

class eliminar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomico;
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
        
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testEliminarSocioeconomicoAtleta(){
        $id_atleta = self::$pdo->query('SELECT  id from atletas where cedula="austraca"')->fetch(\PDO::FETCH_ASSOC)['id']; 
        
        $this->socioeconomico->set_nombre_atleta($id_atleta);
        
        $this->assertEquals('ingrese datos correctamente',$this->socioeconomico->eliminar('29831184','5'));

    }
}

?>