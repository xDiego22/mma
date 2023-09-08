<?php 
use PHPUnit\Framework\TestCase;

use modelo\gestionar_clubes;

class modificar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');
    }

    public function tearDown():void {
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1','1'); 
    }

    public function testModificarClubes(){
        
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('tortugas peleadoras 2023');
        $this->clubes->set_telefono_club('04249876754');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('carora');

        $modificar = $this->clubes->modificar('1','29831184','1');

        $this->assertStringStartsWith('<tr>', $modificar);
    }
}
?>