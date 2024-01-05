<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_eventos;
class eliminar_gestionar_eventosTest extends TestCase{
    private $eventos;

    public function setUp():void{
        $this->eventos = new gestionar_eventos();
        
        $this->eventos->set_nombre_evento('evento deportivo miami 2023');
        $this->eventos->set_fecha_evento('2023-03-07');
        $this->eventos->set_hora_evento('19:30');
        $this->eventos->set_club_responsable_evento('18');
        $this->eventos->set_monto_evento('1$');
        $this->eventos->set_direccion_evento('barquisimeto');
        $this->eventos->set_juez1('ruander cuello');
        $this->eventos->set_juez2('cirez barriga');
        $this->eventos->set_juez3('luis perdomo');

        $this->eventos->registrar('1','29831184','6');
    }

    public function testEliminarEventos(){
        $this->eventos->set_nombre_evento('evento deportivo miami 2023');

        $this->assertEquals('eliminado',$this->eventos->eliminar('29831184','6','1'));
    }
}

?>