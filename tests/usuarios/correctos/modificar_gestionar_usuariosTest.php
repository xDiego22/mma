<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_usuarios;

class modificar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();

        $this->usuarios->set_cedula_usuarios('7852258');
        $this->usuarios->set_nombre_usuarios('victor gutierrez');
        $this->usuarios->set_contrasena_usuarios('gutie123');
        $this->usuarios->set_rol_usuario('1');
        $this->usuarios->set_correo_usuarios('roswins12.11@outlook.com');

        $this->usuarios->registrar('1','29831184','7');
    }

    public function tearDown():void {
        $this->usuarios->set_cedula_usuarios('7852258');
        $this->usuarios->eliminar('29831184','7','1'); 
    }

    public function testModificarUsuarios(){

        $this->usuarios->set_cedula_usuarios('7852258');
        $this->usuarios->set_nombre_usuarios('victor gomez');
        $this->usuarios->set_contrasena_usuarios('gonza.123');
        $this->usuarios->set_rol_usuario('1');
        $this->usuarios->set_correo_usuarios('vitorgz12.11@outlook.com');

        $modificar = $this->usuarios->modificar('1','29831184','7');

        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>