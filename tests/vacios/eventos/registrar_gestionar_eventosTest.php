<?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_eventos;

class registrar_gestionar_eventosTest extends TestCase{
    private $eventos;
    protected static $pdo;

    public function setUp():void{
        
        $this->eventos = new gestionar_eventos();
    }

    public function testRegistrarEventos(){

        $this->eventos->set_nombre_evento('');
        $this->eventos->set_fecha_evento('');
        $this->eventos->set_hora_evento('');
        $this->eventos->set_club_responsable_evento('');
        $this->eventos->set_monto_evento('');
        $this->eventos->set_direccion_evento('');
        $this->eventos->set_juez1('');
        $this->eventos->set_juez2('');
        $this->eventos->set_juez3('');

        $registro = $this->eventos->registrar('1','29831184','6');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>