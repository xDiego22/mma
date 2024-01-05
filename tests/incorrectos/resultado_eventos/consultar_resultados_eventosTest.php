<?php 

use PHPUnit\Framework\TestCase;
use modelo\resultados_eventos;

class consultar_resultados_eventosTest extends TestCase{

    private $resultados;

    public function setUp():void{
        
        $this->resultados = new resultados_eventos();
        
    }
    public function testConsultarResultadosEventos(){

        $consultar = $this->resultados->consultar('1@$ff','2#g=/4','#d1d@.');
        $this->assertJson($consultar);

    }

}

?>