 <?php 

use PHPUnit\Framework\TestCase;

use modelo\resultados_eventos;

class eliminar_resultados_eventosTest extends TestCase{
    private $resultados;

    public function setUp():void{

        $this->resultados = new resultados_eventos();
    }

    public function testEliminarResultadosEventos(){

        $this->resultados->set_nombre_evento('f$&Fees');
        $this->resultados->set_atleta_ganador('4&:E35/');
        $this->resultados->set_atleta_perdedor('.:13R25&&/('); 
        $this->resultados->set_ronda('a&:;s,2d.');
        $this->resultados->set_forma_ganar('28130218');
        
        $this->assertEquals('eliminado',$this->resultados->eliminar('29831184','12','1'));

    }

}

?>