<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_personal;

class registrar_gestionar_personalTest extends TestCase{
    private $personal;
    protected static $pdo;

    public function setUp():void{
        
        $this->personal = new gestionar_personal();
    }

    public function testRegistrarPersonal(){

        $this->personal->set_club_personal('?$%@');
        $this->personal->set_cedula_personal('4%/22%');
        $this->personal->set_nombres_personal('%$#%/');
        $this->personal->set_apellidos_personal('$$@#&');
        $this->personal->set_telefono_personal('/(=!Q');
        $this->personal->set_cargo_personal('$FG&/(/');
        $this->personal->set_direccion_personal('&&"344%%');

        $registro = $this->personal->registrar('%!@@','2%#%@4','5!#$');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>