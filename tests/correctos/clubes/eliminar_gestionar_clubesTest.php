<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_clubes;

class eliminar_gestionar_clubesTest extends TestCase{
    public function setUp():void{
        $this->clubes = new gestionar_clubes();

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');
    }

    public function testEliminarClubes(){
        $this->clubes->set_codigo_club('qwertyuiop');

        $this->assertEquals('eliminado',$this->clubes->eliminar('29831184','1','1'));
    }
}

?>