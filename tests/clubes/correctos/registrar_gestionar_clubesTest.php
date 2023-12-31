<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_clubes;

class registrar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }
    
    public function tearDown():void {
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1','1'); 
    }

    public function testRegistrarClubes(){
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $registro = $this->clubes->registrar('1','29831184','1');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>