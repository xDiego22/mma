<?php 

use PHPUnit\Framework\TestCase;

use modelo\inscripcion_evento;

class registrar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;
   
    public function setUp():void{
        $this->inscripcion = new inscripcion_evento();
    }

    public function testRegistrarInscripcionEvento(){

        $this->inscripcion->set_evento_inscripcion('');
        $this->inscripcion->set_cedula_inscripcion('');
        $this->inscripcion->set_nombre_inscripcion('');
        $this->inscripcion->set_sexo_inscripcion('');
        $this->inscripcion->set_peso_inscripcion('');
        $this->inscripcion->set_fechadenacimiento('');
        $this->inscripcion->set_estado('');

        $registrar = $this->inscripcion->incluir('1','29831184','10');

        $this->assertEquals('ingrese datos correctamente', $registrar);
    }
}

?>