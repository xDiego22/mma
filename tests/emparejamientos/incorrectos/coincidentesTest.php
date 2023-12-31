<?php 
 
use PHPUnit\Framework\TestCase;
use modelo\emparejamiento_combates;

class coincidentesTest extends TestCase{

    private $emparejamiento;
    public function setUp():void{
        
        $this->emparejamientos = new emparejamiento_combates();
    }
    public function testGuardarEmparejamiento(){
    
        $id_evento = '$@5f9';
        $sexo = 'MlF+&%';
        $edad = '4+$f' ;
        $peso =  '2+[.d';
        $orden = 's1@,$';
        $cedula_usuario = '3F5?=4@';
        $modulo = '1%&g';

        $this->assertStringStartsWith("<tr id='fila1'>",$this->emparejamientos->coincidentes($id_evento,$sexo,$edad,$peso,$orden,$cedula_usuario,$modulo));
    }
}

?>