<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_usuarios;

class modificar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }

    public function testModificarUsuarios(){

        $this->usuarios->set_cedula_usuarios('');
        $this->usuarios->set_nombre_usuarios('');
        $this->usuarios->set_contrasena_usuarios('');
        $this->usuarios->set_rol_usuario('');
        $this->usuarios->set_correo_usuarios('');

        $modificar = $this->usuarios->modificar('1','29831184','7');

        $this->assertEquals('Error: ingrese datos correctamente', $modificar);
    }
}

?>