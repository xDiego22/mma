<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_personal;

class registrar_gestionar_personalTest extends TestCase{

    private $personal;
    public function setUp():void{
        
        $this->personal = new gestionar_personal();
    }
    public function tearDown():void {
        $this->personal->set_cedula_personal('29604245');
        $this->personal->eliminar('29831184','2','1');
    }
    public function testRegistrarPersonal(){

        $this->personal->set_club_personal('88');
        $this->personal->set_cedula_personal('29604245');
        $this->personal->set_nombres_personal('ruander');
        $this->personal->set_apellidos_personal('cuello');
        $this->personal->set_telefono_personal('04241234567');
        $this->personal->set_cargo_personal('Entrenador');
        $this->personal->set_direccion_personal('quibor');

        $registro = $this->personal->registrar('1','29831184','2');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>