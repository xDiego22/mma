<?php 
 
use PHPUnit\Framework\TestCase;

use modelo\emparejamiento_combates;

class guardar_emparejamientosTest extends TestCase{
    private $emparejamientos;
   
    public function setUp():void{
        
        $this->emparejamientos = new emparejamiento_combates();
    }

    public function testGuardarEmparejamiento(){
    
        $json_atleta = json_encode(array('de+1#(34'));

        $this->assertEquals('ingrese datos correctamente',$this->emparejamientos->guarda('+12%$1dds',$json_atleta,'29831184','11'));
    }
}

?>