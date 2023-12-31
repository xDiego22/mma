<?php 
use PHPUnit\Framework\TestCase;

use modelo\gestionar_eventos;

class consultar_gestionar_eventosTest extends TestCase{
    private $eventos;

    public function setUp():void{
        $this->eventos = new gestionar_eventos();       
    }
    public function testConsultarEventos(){
        
        $consultar = $this->eventos->consultar('1','29831184','6');

        $this->assertJson($consultar);
    }
}

?>