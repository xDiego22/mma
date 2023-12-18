<?php 

use PHPUnit\Framework\TestCase;

use modelo\socioeconomico_atleta;

class eliminar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomico;
    
    public function setUp():void{
        
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testEliminarSocioeconomicoAtleta(){
        
        $this->socioeconomico->set_nombre_atleta('c!#%/$-S');
        
        $this->assertEquals('eliminado',$this->socioeconomico->eliminar('29831184','5','1'));

    }
}

?>