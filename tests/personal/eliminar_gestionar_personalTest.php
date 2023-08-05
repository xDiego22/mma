<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_personal;

class eliminar_gestionar_personalTest extends TestCase{
    private $personal;
    protected static $pdo;

    public function setUp():void{
        
        $this->personal = new gestionar_personal();
    }

    public function testEliminarPersonal(){
    
        $this->personal->set_cedula_personal('peruana');
        $this->assertEquals('ingrese datos correctamente',$this->personal->eliminar('29831184','2'));
       
    }
}

?>