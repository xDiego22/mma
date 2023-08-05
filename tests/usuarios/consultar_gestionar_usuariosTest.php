<?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_usuarios;

class consultar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();

        $this->usuarios->set_cedula_usuarios('7852258');
        $this->usuarios->set_nombre_usuarios('victor gutierrez');
        $this->usuarios->set_contrasena_usuarios('gutie123');
        $this->usuarios->set_rol_usuario('1');

        $this->usuarios->registrar('1','29831184','7');
    }

    public function tearDown():void {
        $this->usuarios->set_cedula_usuarios('7852258');
        $this->usuarios->eliminar('29831184','7'); 
    }

    public function testConsultarUsuarios(){
        $consultar = $this->usuarios->consultar('1','29831184','7');

        $this->assertStringStartsWith('<tr>', $consultar);
    }
}

?>