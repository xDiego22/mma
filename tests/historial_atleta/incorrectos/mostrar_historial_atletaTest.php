 <?php 

use PHPUnit\Framework\TestCase;

use modelo\historial_atleta;

class mostrar_historial_atletaTest extends TestCase{
    private $historial;
    
    public function setUp():void{
        $this->historial = new historial_atleta();
    }

    public function testConsultarResultadosEventos(){

        $mostrar = $this->historial->mostrar_resultado('3d1w+}');
        $this->assertEquals('ingrese datos correctamente', $mostrar);

    }

}

?>