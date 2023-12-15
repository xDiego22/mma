<?php 

use PHPUnit\Framework\TestCase;

use modelo\roles_permisos;

class eliminar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function testEliminarRol(){

        $this->rol->set_nombre('');
        $this->assertEquals('eliminado',$this->rol->eliminar('29831184','9','1'));
    }
}

?>