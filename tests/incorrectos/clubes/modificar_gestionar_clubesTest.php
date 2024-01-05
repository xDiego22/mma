<?php 
use PHPUnit\Framework\TestCase;
use modelo\gestionar_clubes;

class modificar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testModificarClubes(){
        
        $this->clubes->set_codigo_club('132$%@?');
        $this->clubes->set_nombre_club('?¡$&&');
        $this->clubes->set_telefono_club('&%fr=');
        $this->clubes->set_deporte_club('3$%%');
        $this->clubes->set_direccion_club('%$!ff');

        $modificar = $this->clubes->modificar('#@%&','298!#$@','fr%!');

        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}
?>