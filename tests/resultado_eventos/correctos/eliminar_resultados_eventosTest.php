 <?php 

use PHPUnit\Framework\TestCase;
use modelo\resultados_eventos;

class eliminar_resultados_eventosTest extends TestCase{
    private $resultados;

    public function setUp():void{
        
        $this->resultados = new resultados_eventos();

        $this->resultados->set_nombre_evento('9');
        $this->resultados->set_atleta_ganador('12');
        $this->resultados->set_atleta_perdedor('14'); 
        $this->resultados->set_ronda('1');
        $this->resultados->set_forma_ganar('sumision');
        
        $this->resultados->registrar('1','29831184','12');
    }
    public function testEliminarResultadosEventos(){

        $this->resultados->set_nombre_evento('9');
        $this->resultados->set_atleta_ganador('12');
        $this->resultados->set_atleta_perdedor('14'); 
        $this->resultados->set_ronda('1');
        $this->resultados->set_forma_ganar('sumision');
        
        $this->assertEquals('eliminado',$this->resultados->eliminar('29831184','12','1'));

    }
}

?>