 <?php 

use PHPUnit\Framework\TestCase;

use modelo\resultados_eventos;

class registrar_resultados_eventosTest extends TestCase{
    private $resultados;

    public function setUp():void{
        
        $this->resultados = new resultados_eventos();
    }

    public function testRegistrarResultadosEventos(){

        $this->resultados->set_nombre_evento('1=8!¿,$%');
        $this->resultados->set_atleta_ganador('4&/6(%');
        $this->resultados->set_atleta_perdedor('.:12$&/('); 
        $this->resultados->set_ronda('a&%2d.');
        $this->resultados->set_forma_ganar('2=2$&/');
        
        $registrar = $this->resultados->registrar('1','29831184','12');
        $this->assertEquals('Registrado Correctamente', $registrar);
    }

}

?>