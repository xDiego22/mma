<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_usuarios;

class modificar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }

    public function testModificarUsuarios(){

        $this->usuarios->set_cedula_usuarios('marroquie');
        $this->usuarios->set_nombre_usuarios('123211');
        $this->usuarios->set_contrasena_usuarios('?¡?¡?¡?¡?');
        $this->usuarios->set_rol_usuario('fsadd');
        $this->usuarios->set_correo_usuarios('ds+1;.:,():12');

        $modificar = $this->usuarios->modificar('1','29831184','7');
        
        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>