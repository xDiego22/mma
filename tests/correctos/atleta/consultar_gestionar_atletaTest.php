<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_atleta;

class consultar_gestionar_atletaTest extends TestCase{
    private $atleta;

    public function setUp():void{
        $this->atleta = new gestionar_atleta();
    }

    public function testConsultarAtleta(){
    
       $consultar = $this->atleta->consultar('1','29831184','3');
        $this->assertJson($consultar);
    }
}

?>