<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_personal;

class consultar_gestionar_personalTest extends TestCase{
    private $personal;

    public function setUp():void{
        $this->personal = new gestionar_personal();

    }

    public function testConsultarPersonal(){
        $consultar = $this->personal->consultar('1$%@','29&%!88','2/&');
        
        $this->assertJson($consultar);
    }
}

?>