<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_usuarios;

class modificar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }

    public function testModificarUsuarios(){

        $this->usuarios->set_cedula_usuarios('m234r#');
        $this->usuarios->set_nombre_usuarios('12#/&');
        $this->usuarios->set_contrasena_usuarios('dd#@=');
        $this->usuarios->set_rol_usuario('1EE$()');
        $this->usuarios->set_correo_usuarios('ffwe@?[');

        $modificar = $this->usuarios->modificar('d$&','d#$%','%@ff');
        
        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>