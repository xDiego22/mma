 <?php 

use PHPUnit\Framework\TestCase;
use modelo\socioeconomico_atleta;

class consultar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomico;

    public function setUp():void{
        
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testConsultarSocioeconomicoAtleta(){
        
        $consultar = $this->socioeconomico->consultar('1','29831184','5');
        $this->assertJson($consultar);
    }
}

?>