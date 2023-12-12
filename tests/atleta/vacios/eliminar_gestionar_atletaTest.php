<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_atleta;

class eliminar_gestionar_atletaTest extends TestCase{
    private $atleta;
    
    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
    }

    public function testEliminarAtleta(){
        $this->atleta->set_cedula_atleta('');
        $this->assertEquals('eliminado',$this->atleta->eliminar('29831184','3','1'));
    }
}

?>