<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_usuarios;

class eliminar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }

    public function testEliminarUsuarios(){
        $this->usuarios->set_cedula_usuarios('peruana');
         
        $this->assertEquals('Error: ingrese datos correctamente',$this->usuarios->eliminar('29831184','7','1'));    
       
    }
}

?>