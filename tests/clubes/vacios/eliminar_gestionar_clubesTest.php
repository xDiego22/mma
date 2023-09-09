<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_clubes;


class eliminar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testEliminarClubes(){
        $this->clubes->set_codigo_club('');

        $this->assertEquals('ingrese datos correctamente',$this->clubes->eliminar('1','29831184','1'));
    }
}

?>