<?php 

use PHPUnit\Framework\TestCase;
use modelo\bitacora_usuario;

class consultar_bitacora_usuarioTest extends TestCase{
    private $bitacora;

    public function setUp():void{
       
        $this->bitacora = new bitacora_usuario();
    }

    public function testBitacoraUsuario(){
        $rol_usuario = '1';
        $bitacora = $this->bitacora->consultar($rol_usuario);

        $this->assertJson($bitacora);
    }
}

?>