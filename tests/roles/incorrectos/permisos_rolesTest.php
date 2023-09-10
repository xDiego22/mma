<?php 

use PHPUnit\Framework\TestCase;

use modelo\roles_permisos;

class permisos_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function testPermisosRol(){

        $this->rol->set_rol_2('dwed2');

        
        $this->assertEquals('ingrese datos correctamente',$this->rol->actualizar_permisos('3d43$%','d#%R&&:;','#$:)=','##$%:;¡','#E#!/($','1'));
    }
}

?>