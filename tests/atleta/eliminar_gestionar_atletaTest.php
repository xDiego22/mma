 <?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_atleta;

class eliminar_gestionar_atletaTest extends TestCase{
    private $atleta;
    protected static $pdo;
    

    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
    }

    public function testEliminarAtleta(){
        $this->atleta->set_cedula_atleta('sankdhksa');
        $this->assertEquals('ingrese datos correctamente',$this->atleta->eliminar('29831184','1'));
    }
}

?>