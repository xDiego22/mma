 <?php 

use PHPUnit\Framework\TestCase;
use modelo\historial_atleta;

class mostrar_historial_atletaTest extends TestCase{
    private $historial;
    
    public function setUp():void{
        $this->historial = new historial_atleta();
    }

    public function testConsultarResultadosEventos(){

        $id_atleta = '3d1w+}';

        $mostrar = $this->historial->mostrar_resultado( $id_atleta );
        $this->assertStringStartsWith('<tr>', $mostrar);

    }

}

?>