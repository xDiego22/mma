<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_personal;

class modificar_gestionar_personalTest extends TestCase{
    private $personal;

    public function setUp():void{
        
        $this->personal = new gestionar_personal();
    }

    public function testModificarPersonal(){

        $this->personal->set_club_personal('?4%%#');
        $this->personal->set_cedula_personal('!"@#$%');
        $this->personal->set_nombres_personal('&/ff&¡');
        $this->personal->set_apellidos_personal('45!#"$');
        $this->personal->set_telefono_personal('@#)=ff');
        $this->personal->set_cargo_personal('ffg$!#');
        $this->personal->set_direccion_personal('45!"@');

        $modificar = $this->personal->modificar('1%!','29%!%#4','&%%1');

        $this->assertEquals('Modificado Correctamente', $modificar);
       
    }
}

?>