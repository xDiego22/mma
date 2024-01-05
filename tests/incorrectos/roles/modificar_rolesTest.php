<?php 

use PHPUnit\Framework\TestCase;
use modelo\roles_permisos;

class modificar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function testModificarRol(){

        $this->rol->set_nombre('37%=()');
        $this->rol->set_descripcion('!R1&/');

        $modificar = $this->rol->modificar('1@%$','/&1dd','##$1');
        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>