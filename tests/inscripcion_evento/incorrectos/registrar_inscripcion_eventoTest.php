<?php 

use PHPUnit\Framework\TestCase;
use modelo\inscripcion_evento;

class registrar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;
   
    public function setUp():void{
        $this->inscripcion = new inscripcion_evento();
    }

    public function testRegistrarInscripcionEvento(){

        $this->inscripcion->set_evento_inscripcion('?3Ff%@');
        $this->inscripcion->set_cedula_inscripcion('43fF/&[');
        $this->inscripcion->set_nombre_inscripcion('1[ff-,?');
        $this->inscripcion->set_sexo_inscripcion('4$dd?$');
        $this->inscripcion->set_peso_inscripcion('m3.F$@');
        $this->inscripcion->set_fechadenacimiento('e*f+.');
        $this->inscripcion->set_estado('1$5ñ%,');

        $registrar = $this->inscripcion->incluir('1$=.','2?F@$','%{6GF');

        $this->assertStringStartsWith('<tr>', $registrar);
    }
}

?>