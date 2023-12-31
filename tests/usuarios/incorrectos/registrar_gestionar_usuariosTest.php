<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_usuarios;

class registrar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }
    public function testRegistrarUsuarios(){
        
        $this->usuarios->set_cedula_usuarios('11cd#');
        $this->usuarios->set_nombre_usuarios('3?!d');
        $this->usuarios->set_contrasena_usuarios('de-.1?');
        $this->usuarios->set_rol_usuario('a$');
        $this->usuarios->set_correo_usuarios('es%.e');

        $registro = $this->usuarios->registrar('d2$','w3&','5r%');

        $this->assertEquals('Registrado Correctamente', $registro);

    }
}

?>