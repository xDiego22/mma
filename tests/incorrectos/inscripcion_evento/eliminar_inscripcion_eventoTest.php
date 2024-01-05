<?php 

use PHPUnit\Framework\TestCase;
use modelo\inscripcion_evento;

class eliminar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;

    public function setUp():void{

        $this->inscripcion = new inscripcion_evento();
    }

    public function testEliminarInscripcionEvento(){

        $id_evento = '3@%6';
        $cedula_atleta = '4!#5';
        $modulo = '1%/@';
        $rol = '1$g)=.';
        $cedula_usuario = '85yg"#6';

        $this->assertEquals('eliminado',$this->inscripcion->elimina_atletas($id_evento,$cedula_atleta,$cedula_usuario,$modulo,$rol));
    }
}

?>