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

        $id_modulo = '3d43$%';
        $registrar = 'd#%R&&:;';
        $consular= '#$:)=';
        $modificar = '##$%:;¡';
        $eliminar = '#E#!/($';
        $rol_usuario = '$11@'; 

        $actualizar_permisos = $this->rol->actualizar_permisos($id_modulo,$registrar,$consular,$modificar,$eliminar,$rol_usuario);
        
        $this->assertEquals('permiso actualizado',$actualizar_permisos);
    }
}

?>