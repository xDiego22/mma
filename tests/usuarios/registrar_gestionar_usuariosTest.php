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

        $registro = $this->usuarios->registrar('1','29831184','7');

        $this->assertEquals('ingrese datos correctamente', $registro);
    }
}

?>