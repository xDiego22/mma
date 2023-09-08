<?php 
use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_eventos;

class modificar_gestionar_eventosTest extends TestCase{
    private $eventos;
    protected static $pdo;

    public function setUp():void{
        
        $this->eventos = new gestionar_eventos();
    }

    public function testModificarEventos(){

        $this->eventos->set_nombre_evento('83120?¡?¡');
        $this->eventos->set_fecha_evento('mañana');
        $this->eventos->set_hora_evento('mapsad');
        $this->eventos->set_club_responsable_evento('123098?¡?');
        $this->eventos->set_monto_evento('muchaplata');
        $this->eventos->set_direccion_evento('123213');
        $this->eventos->set_juez1('10322013');
        $this->eventos->set_juez2('123123');
        $this->eventos->set_juez3('123123');
        
        $modificar = $this->eventos->modificar('1','29831184','6');

       $this->assertStringStartsWith('<tr>', $modificar);
    }
}

?>