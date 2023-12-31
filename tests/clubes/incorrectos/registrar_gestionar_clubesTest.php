<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_clubes;

class registrar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testRegistrarClubes(){
        $this->clubes->set_codigo_club('132¡?¡?¡?');
        $this->clubes->set_nombre_club('?¡?¡?¡?');
        $this->clubes->set_telefono_club('e#234F');
        $this->clubes->set_deporte_club('332@)=');
        $this->clubes->set_direccion_club('21$$#@19');

        $registro = $this->clubes->registrar('1$#@','2983!$%','=%3');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>