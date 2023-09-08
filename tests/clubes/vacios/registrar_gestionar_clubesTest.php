<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_clubes;

class registrar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testRegistrarClubes(){
        $this->clubes->set_codigo_club('');
        $this->clubes->set_nombre_club('');
        $this->clubes->set_telefono_club('');
        $this->clubes->set_deporte_club('');
        $this->clubes->set_direccion_club('');

        $registro = $this->clubes->registrar('1','29831184','1');

        $this->assertStringStartsWith('<tr>', $registro);
    }
}

?>