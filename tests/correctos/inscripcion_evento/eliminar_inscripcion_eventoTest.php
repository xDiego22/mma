<?php 

use PHPUnit\Framework\TestCase;
use modelo\inscripcion_evento;
class eliminar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;

    public function setUp():void{
        $this->inscripcion = new inscripcion_evento();

        $this->inscripcion->set_evento_inscripcion('37');
        $this->inscripcion->set_cedula_inscripcion('12092167');
        $this->inscripcion->set_nombre_inscripcion('Raul Aguilar');
        $this->inscripcion->set_sexo_inscripcion('Masculino');
        $this->inscripcion->set_peso_inscripcion('80.3');
        $this->inscripcion->set_fechadenacimiento('1974-10-31');
        $this->inscripcion->set_estado('Lara');

        $this->inscripcion->incluir('1','29831184','10');
    }
    public function testEliminarInscripcionEvento(){
    
        $id_evento = '37';
        $cedula_atleta = '12092167';
        $modulo = '10';
        $rol = '1';
        $cedula_usuario = '29831184';

        $this->assertEquals('eliminado',$this->inscripcion->elimina_atletas($id_evento,$cedula_atleta,$cedula_usuario,$modulo,$rol));
    }
}

?>