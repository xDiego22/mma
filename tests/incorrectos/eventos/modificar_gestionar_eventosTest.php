<?php 
use PHPUnit\Framework\TestCase;
use modelo\gestionar_eventos;
class modificar_gestionar_eventosTest extends TestCase{
    private $eventos;

    public function setUp():void{
        $this->eventos = new gestionar_eventos();
    }
    public function testModificarEventos(){

        $this->eventos->set_nombre_evento('8$/=@r?');
        $this->eventos->set_fecha_evento('m34-&/');
        $this->eventos->set_hora_evento('m=?2@-');
        $this->eventos->set_club_responsable_evento('1=@!?');
        $this->eventos->set_monto_evento('m33ñ;+');
        $this->eventos->set_direccion_evento('1#=)ñ[@');
        $this->eventos->set_juez1('1*+s?2');
        $this->eventos->set_juez2('1Q$@3');
        $this->eventos->set_juez3('1_d$&3');
        
        $modificar = $this->eventos->modificar('1"#@f','2[-%84','$%7)g');

        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>