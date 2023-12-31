<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_eventos;

class eliminar_gestionar_eventosTest extends TestCase{
    private $eventos;

    public function setUp():void{
        $this->eventos = new gestionar_eventos();
    }

    public function testEliminarEventos(){
        $this->eventos->set_nombre_evento('#R44@');
        
        $this->assertEquals('eliminado',$this->eventos->eliminar('2E5=!@','.#4&d','%rff='));
    }
}


?>