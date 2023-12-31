<?php 

use PHPUnit\Framework\TestCase;
use modelo\perfil;

class cambiar_contrasenaTest extends TestCase{
    private $perfil;

    public function setUp():void{
        $this->perfil = new perfil();
    }

    public function testCambiarContrasena(){

        $this->perfil->set_cedula_usuario('R$@/ff');
        $this->perfil->set_contrasena_actual('$Ff=?');
		$this->perfil->set_contrasena_nueva('$Ff5@.');

        $this->assertEquals('Se ha modificado la contraseña exitosamente', $this->perfil->cambiarContrasena());
    }
}

?>