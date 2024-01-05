<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_usuarios;
class consultar_gestionar_usuariosTest extends TestCase{
    private $usuarios;

    public function setUp():void{
        $this->usuarios = new gestionar_usuarios();
    }

    public function testConsultarUsuarios(){
        $consultar = $this->usuarios->consultar('d2$','#8d','2h?');

        $this->assertJson($consultar);
    }
}

?>