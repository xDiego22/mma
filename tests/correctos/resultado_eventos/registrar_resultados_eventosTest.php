 <?php 

use PHPUnit\Framework\TestCase;
use modelo\resultados_eventos;
class registrar_resultados_eventosTest extends TestCase{
    private $resultados;

    public function setUp():void{
        
        $this->resultados = new resultados_eventos();
    }
    public function tearDown():void {

        $this->resultados->set_nombre_evento('9');
        $this->resultados->set_atleta_ganador('12');
        $this->resultados->set_atleta_perdedor('14'); 
        $this->resultados->set_ronda('1');
        $this->resultados->set_forma_ganar('sumision');

        $this->resultados->eliminar('29831184','12','1');
    }
    public function testRegistrarResultadosEventos(){

        $this->resultados->set_nombre_evento('9');
        $this->resultados->set_atleta_ganador('12');
        $this->resultados->set_atleta_perdedor('14'); 
        $this->resultados->set_ronda('1');
        $this->resultados->set_forma_ganar('sumision');
        
        $registrar = $this->resultados->registrar('1','29831184','12');

        $this->assertEquals('Registrado Correctamente', $registrar);
    }
}

?>