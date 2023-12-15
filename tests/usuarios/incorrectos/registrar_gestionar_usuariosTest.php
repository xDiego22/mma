<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_usuarios;

class registrar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }

    public function testRegistrarUsuarios(){
        
        $this->usuarios->set_cedula_usuarios('13213');
        $this->usuarios->set_nombre_usuarios('?¡?¡?¡?¡?312');
        $this->usuarios->set_contrasena_usuarios('**{}{}{}{');
        $this->usuarios->set_rol_usuario('a');
        $this->usuarios->set_correo_usuarios('ds+1$%/():12');

        $registro = $this->usuarios->registrar('1','29831184','7');

        $this->assertEquals('Registrado Correctamente', $registro);

    }
}

?>