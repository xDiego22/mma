<?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_eventos;

class eliminar_gestionar_eventosTest extends TestCase{
    private $eventos;
    protected static $pdo;

    public function setUp():void{
        
        $this->eventos = new gestionar_eventos();
    }

    public function testEliminarEventos(){
        $this->eventos->set_nombre_evento('1238012?¡?¡');
        
        $this->assertEquals('ingrese datos correctamente',$this->eventos->eliminar('29831184','6'));
    }
}


?>