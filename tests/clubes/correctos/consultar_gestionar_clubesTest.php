<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_clubes;

class consultar_gestionar_clubesTest extends TestCase{
    private $clubes;

    public function setUp():void{
        $this->clubes = new gestionar_clubes();
    }

    public function testConsultarClubes(){

        $consultar = $this->clubes->consultar('1','29831184','1');

        $this->assertJson($consultar);
    }
}

?>