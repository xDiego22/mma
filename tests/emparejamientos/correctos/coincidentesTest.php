<?php 
 
use PHPUnit\Framework\TestCase;
use modelo\emparejamiento_combates;

class coincidentesTest extends TestCase{
    private $emparejamiento;
    public function setUp():void{
        
        $this->emparejamientos = new emparejamiento_combates();
        
    }
    public function testGuardarEmparejamiento(){
    
        $id_evento = '9';
        $sexo = 'Masculino';
        $edad = '4' ;
        $peso =  '2';
        $orden = 'peso';
        $cedula_usuario = '29831184';
        $modulo = '11';

        $this->assertStringStartsWith("<tr id='fila1'>",$this->emparejamientos->coincidentes($id_evento,$sexo,$edad,$peso,$orden,$cedula_usuario,$modulo));
    }
}

?>