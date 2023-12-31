<?php 

use PHPUnit\Framework\TestCase;
use modelo\perfil;

class cambiar_contrasenaTest extends TestCase{
    private $perfil;

    public function setUp():void{
       
        $this->perfil = new perfil();
    }

    public function testCambiarContrasena(){

        $this->perfil->set_cedula_usuario('1234567');
        $this->perfil->set_contrasena_actual('123123');
		$this->perfil->set_contrasena_nueva('contrañanueva123');

        $this->assertEquals('Se ha modificado la contraseña exitosamente', $this->perfil->cambiarContrasena());
    }
}

?>