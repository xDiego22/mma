<?php 

use PHPUnit\Framework\TestCase;
use modelo\inscripcion_evento;

class consultar_inscripcion_eventoTest extends TestCase{
    
    private $inscripcion;

    public function setUp():void{
        $this->inscripcion = new inscripcion_evento();
    }

    public function testConsultarInscripcionEvento(){
        
        $evento = '7#&@';
        $rol_usuario = '/)d1';
        $cedula_bitacora = '28#!d4.';
        $modulo = '1$6f.,';

        $consultar = $this->inscripcion->muestra_inscritos($evento, $rol_usuario, $cedula_bitacora,$modulo);

        $this->assertStringStartsWith('<tr>', $consultar);
    }
}

?>