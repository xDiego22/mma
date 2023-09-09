<?php 

use PHPUnit\Framework\TestCase;

use modelo\medico_atleta;

class eliminar_informacion_medicaTest extends TestCase{
    private $medico;

    public function setUp():void{
        $this->medico = new medico_atleta();
    }

    public function testEliminarMedicoAtleta(){
        
        $this->medico->set_nombre_atleta(',!12%$');
        $this->assertEquals('ingrese datos correctamente',$this->medico->eliminar('29831184','4','1'));

    }
}

?>