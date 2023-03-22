<?php 

use PHPUnit\Framework\TestCase;

use modelo\inscripcion_evento;

class registrar_inscripcion_eventoTest extends TestCase{
    private $inscripcion;
    protected static $pdo;

    public function setUp():void{
        
        $this->inscripcion = new inscripcion_evento();
    }

    public function testRegistrarInscripcionEvento(){

        $this->inscripcion->set_evento_inscripcion('?¡?¡?¡?¡?');
        $this->inscripcion->set_cedula_inscripcion('barileria');
        $this->inscripcion->set_nombre_inscripcion('18239???');
        $this->inscripcion->set_sexo_inscripcion('421321');
        $this->inscripcion->set_peso_inscripcion('mucho');
        $this->inscripcion->set_fechadenacimiento('enero');
        $this->inscripcion->set_estado('12321¡?¡?¡');

        $registrar = $this->inscripcion->incluir('1','29831184','10');

        $this->assertEquals('ingrese datos correctamente', $registrar);
    }
}

?>