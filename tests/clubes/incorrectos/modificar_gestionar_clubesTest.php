<?php 
use PHPUnit\Framework\TestCase;

use modelo\gestionar_clubes;

class modificar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testModificarClubes(){
        
        $this->clubes->set_codigo_club('132¡?¡?¡?');
        $this->clubes->set_nombre_club('?¡?¡?¡?');
        $this->clubes->set_telefono_club('AYER');
        $this->clubes->set_deporte_club('332');
        $this->clubes->set_direccion_club('21937219');

        $modificar = $this->clubes->modificar('1','29831184','1');

        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}
?>