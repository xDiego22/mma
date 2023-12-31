<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_eventos;
class registrar_gestionar_eventosTest extends TestCase{
    private $eventos;

    public function setUp():void{
        $this->eventos = new gestionar_eventos();
    }
    public function testRegistrarEventos(){

        $this->eventos->set_nombre_evento('8$/=@r?');
        $this->eventos->set_fecha_evento('m34-&/');
        $this->eventos->set_hora_evento('m=?2@-');
        $this->eventos->set_club_responsable_evento('1=@!?');
        $this->eventos->set_monto_evento('m33ñ;+');
        $this->eventos->set_direccion_evento('1#=)ñ[@');
        $this->eventos->set_juez1('1*+s?2');
        $this->eventos->set_juez2('1Q$@3');
        $this->eventos->set_juez3('1_d$&3');

        $registro = $this->eventos->registrar('1@!#','55(&).,','6¿7w$');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>