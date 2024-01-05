<?php 
use PHPUnit\Framework\TestCase;
use modelo\gestionar_eventos;
class modificar_gestionar_eventosTest extends TestCase{
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

    public function tearDown():void {
        $this->eventos->set_nombre_evento('evento deportivo miami 2023');
        $this->eventos->eliminar('29831184','6','1'); 
    }

    public function testModificarEventos(){

        $this->eventos->set_nombre_evento('evento deportivo miami 2023');
        $this->eventos->set_fecha_evento('2023-04-09');
        $this->eventos->set_hora_evento('16:30');
        $this->eventos->set_club_responsable_evento('18');
        $this->eventos->set_monto_evento('2$');
        $this->eventos->set_direccion_evento('quibor');
        $this->eventos->set_juez1('pedro sanchez');
        $this->eventos->set_juez2('juan barriga');
        $this->eventos->set_juez3('mario castana');
        
        $modificar = $this->eventos->modificar('1','29831184','6');

         $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>