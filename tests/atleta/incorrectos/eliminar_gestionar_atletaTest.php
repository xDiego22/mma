<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_atleta;

class eliminar_gestionar_atletaTest extends TestCase{
    private $atleta;

    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
    }

    public function testEliminarAtleta(){
        $this->atleta->set_cedula_atleta('#$FF14');
       $this->assertEquals('eliminado', $this->atleta->eliminar('#%1ff44','#@&(()g','$$ccf1'));
    }
}

?>