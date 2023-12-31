<?php 

use PHPUnit\Framework\TestCase;
use modelo\perfil;

class editar_perfilTest extends TestCase{
    private $perfil;

    public function setUp():void{
       
        $this->perfil = new perfil();
    }

    public function testEditarPerfil(){

        $this->perfil->set_cedula_usuario('$f5=%.');
        $this->perfil->set_nombre('J@.+fe3');
		$this->perfil->set_correo('eded!#?:;@a#<om');

        $this->assertEquals('Perfi modificado exitosamente', $this->perfil->editarPerfil());
    }
}

?>