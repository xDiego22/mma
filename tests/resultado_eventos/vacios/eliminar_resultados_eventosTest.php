 <?php 

use PHPUnit\Framework\TestCase;

use modelo\resultados_eventos;

class eliminar_resultados_eventosTest extends TestCase{
    private $resultados;

    public function setUp():void{

        $this->resultados = new resultados_eventos();
    }

    public function testEliminarResultadosEventos(){

        $this->resultados->set_nombre_evento('');
        $this->resultados->set_atleta_ganador('');
        $this->resultados->set_atleta_perdedor(''); 
        $this->resultados->set_ronda('');
        $this->resultados->set_forma_ganar('');
        
        $this->assertEquals('eliminado',$this->resultados->eliminar('29831184','12','1'));

    }

}

?>