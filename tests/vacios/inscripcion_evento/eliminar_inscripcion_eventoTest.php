<?php 

use PHPUnit\Framework\TestCase;

use modelo\inscripcion_evento;

class eliminar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;

    public function setUp():void{

        $this->inscripcion = new inscripcion_evento();
    }

    public function testEliminarInscripcionEvento(){

        $this->assertEquals('ingrese datos correctamente',$this->inscripcion->elimina_atletas('','12092167','29831184','10','1'));
    }
}

?>