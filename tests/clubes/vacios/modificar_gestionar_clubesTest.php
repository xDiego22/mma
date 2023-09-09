<?php 
use PHPUnit\Framework\TestCase;

use modelo\gestionar_clubes;

class modificar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testModificarClubes(){
        
        $this->clubes->set_codigo_club('');
        $this->clubes->set_nombre_club('');
        $this->clubes->set_telefono_club('');
        $this->clubes->set_deporte_club('');
        $this->clubes->set_direccion_club('');

        $modificar = $this->clubes->modificar('1','29831184','1');

       $this->assertEquals('ingrese datos correctamente', $modificar);
    }
}
?>