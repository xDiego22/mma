<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_personal;

class modificar_gestionar_personalTest extends TestCase{
    
    private $personal;

    public function setUp():void{
        
        $this->personal = new gestionar_personal();

        $this->personal->set_club_personal('88');
        $this->personal->set_cedula_personal('29604245');
        $this->personal->set_nombres_personal('ruander');
        $this->personal->set_apellidos_personal('cuello');
        $this->personal->set_telefono_personal('04241234567');
        $this->personal->set_cargo_personal('Entrenador');
        $this->personal->set_direccion_personal('quibor');

        $this->personal->registrar('1','29831184','2');
    }

    public function tearDown():void {
        $this->personal->set_cedula_personal('29604245');
        $this->personal->eliminar('29831184','2','1');
    }

    public function testModificarPersonal(){
        
        $this->personal->set_club_personal('88');
        $this->personal->set_cedula_personal('29604245');
        $this->personal->set_nombres_personal('rayner');
        $this->personal->set_apellidos_personal('sila');
        $this->personal->set_telefono_personal('04141234567');
        $this->personal->set_cargo_personal('Entrenador');
        $this->personal->set_direccion_personal('guarico');

        $modificar = $this->personal->modificar('1','29831184','2');

        $this->assertEquals('Modificado Correctamente', $modificar);
       
    }
}

?>