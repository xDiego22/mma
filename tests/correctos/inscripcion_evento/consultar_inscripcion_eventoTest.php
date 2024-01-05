<?php 

use PHPUnit\Framework\TestCase;
use modelo\inscripcion_evento;

class consultar_inscripcion_eventoTest extends TestCase{
    
    private $inscripcion;

    public function setUp():void{
        $this->inscripcion = new inscripcion_evento();
    }

    public function testConsultarInscripcionEvento(){
        
        $evento = '9';
        $rol_usuario = '1';
        $cedula_bitacora = '29831184';
        $modulo = '10';

        $consultar = $this->inscripcion->muestra_inscritos($evento, $rol_usuario, $cedula_bitacora,$modulo);

        $this->assertStringStartsWith('<tr>', $consultar);
    }
}

?>