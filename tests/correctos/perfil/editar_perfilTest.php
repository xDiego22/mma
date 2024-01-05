<?php 

use PHPUnit\Framework\TestCase;
use modelo\perfil;

class editar_perfilTest extends TestCase{
    private $perfil;

    public function setUp():void{
       
        $this->perfil = new perfil();
    }

    public function testEditarPerfil(){

        $this->perfil->set_cedula_usuario('1234567');
        $this->perfil->set_nombre('Jose Ramonez');
		$this->perfil->set_correo('joseramonez_1@gmail.com');

        $this->assertEquals('Perfi modificado exitosamente', $this->perfil->editarPerfil());
    }
}

?>