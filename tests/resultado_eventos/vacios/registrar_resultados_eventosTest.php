 <?php 

use PHPUnit\Framework\TestCase;

use modelo\resultados_eventos;

class registrar_resultados_eventosTest extends TestCase{
    private $resultados;

    public function setUp():void{
        
        $this->resultados = new resultados_eventos();
    }

    public function testRegistrarResultadosEventos(){

        $this->resultados->set_nombre_evento('');
        $this->resultados->set_atleta_ganador('');
        $this->resultados->set_atleta_perdedor(''); 
        $this->resultados->set_ronda('');
        $this->resultados->set_forma_ganar('');
        
        $registrar = $this->resultados->registrar('1','29831184','12');

        $this->assertEquals('ingrese datos correctamente', $registrar);
    }

}

?>