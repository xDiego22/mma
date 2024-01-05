<?php 
 
use PHPUnit\Framework\TestCase;
use modelo\emparejamiento_combates;

class guardar_emparejamientosTest extends TestCase{
    private $emparejamientos;
   
    public function setUp():void{        
        $this->emparejamientos = new emparejamiento_combates();
    }
    public function testGuardarEmparejamiento(){

        $id_evento = '+12%$1@';
        //id atleta ficticio recien registrado
        $id_atleta = 'de+1#(34';

        $json_atleta = json_encode(array($id_atleta));
        $cedula_usuario = '1&"@+4';
        $modulo = '1f%6@';

        $this->assertEquals('Registro Guardado',$this->emparejamientos->guarda($id_evento,$json_atleta,$cedula_usuario,$modulo));

    }
}

?>