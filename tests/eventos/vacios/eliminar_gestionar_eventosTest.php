<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_eventos;

class eliminar_gestionar_eventosTest extends TestCase{
    private $eventos;

    public function setUp():void{
        $this->eventos = new gestionar_eventos();
    }

    public function testEliminarEventos(){
        $this->eventos->set_nombre_evento('');
        
         $this->assertEquals('ingrese datos correctamente',$this->eventos->eliminar('29831184','6','1'));
    }
}


?>