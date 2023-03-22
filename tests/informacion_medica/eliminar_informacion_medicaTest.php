 <?php 

use PHPUnit\Framework\TestCase;

use modelo\medico_atleta;

class eliminar_informacion_medicaTest extends TestCase{
    private $medico;
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
        
        $this->medico = new medico_atleta();
    }

    public function testEliminarMedicoAtleta(){
        $id_atleta = self::$pdo->query('SELECT  id from atletas where cedula="extranjero"')->fetch(\PDO::FETCH_ASSOC)['id']; 
        
        $this->medico->set_nombre_atleta($id_atleta);
        $this->assertEquals('ingrese datos correctamente',$this->medico->eliminar('29831184','4'));

    }
}

?>