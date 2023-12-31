<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_personal;

class eliminar_gestionar_personalTest extends TestCase{
    private $personal;

    public function setUp():void{
        
        $this->personal = new gestionar_personal();
    }

    public function testEliminarPersonal(){
    
        $this->personal->set_cedula_personal('$@&/RR');
        $this->assertEquals('eliminado',$this->personal->eliminar('298&&%@f','2$%(','/($ff5'));
       
    }
}

?>