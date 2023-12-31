<?php 

use PHPUnit\Framework\TestCase;
use modelo\resultados_eventos;

class consultar_resultados_eventosTest extends TestCase{

    private $resultados;

    public function setUp():void{
        
        $this->resultados = new resultados_eventos();
    }
    public function testConsultarResultadosEventos(){

        $consultar = $this->resultados->consultar('1','29831184','12');
        $this->assertJson($consultar);

    }
}

?>