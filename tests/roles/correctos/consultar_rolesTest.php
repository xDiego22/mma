<?php 

use PHPUnit\Framework\TestCase;
use modelo\roles_permisos;

class consultar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }
    public function testConsultarRol(){

        $consultar = $this->rol->consultar('1','29831184','9');

        $this->assertjson($consultar);
    }
}

?>