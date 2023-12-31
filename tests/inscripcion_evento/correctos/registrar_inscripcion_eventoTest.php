<?php 

use PHPUnit\Framework\TestCase;
use modelo\inscripcion_evento;
class registrar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;

    public function setUp():void{
        
        $this->inscripcion = new inscripcion_evento();
    }
    public function tearDown():void {
        $this->inscripcion->elimina_atletas('37','12092167','29831184','10','1'); 
    }
    public function testRegistrarInscripcionEvento(){

        $this->inscripcion->set_evento_inscripcion('37');
        $this->inscripcion->set_cedula_inscripcion('12092167');
        $this->inscripcion->set_nombre_inscripcion('Raul Aguilar');
        $this->inscripcion->set_sexo_inscripcion('Masculino');
        $this->inscripcion->set_peso_inscripcion('80.3');
        $this->inscripcion->set_fechadenacimiento('1974-10-31');
        $this->inscripcion->set_estado('Lara');

        $registrar = $this->inscripcion->incluir('1','29831184','10');

        $this->assertStringStartsWith('<tr>', $registrar);
    }
}

?>