<?php 

use PHPUnit\Framework\TestCase;

use modelo\roles_permisos;

class registrar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function testRegistrarRol(){
        
        $this->rol->set_nombre('21312?¡?¡');
        $this->rol->set_descripcion('2131?¡?¡');
 
        $this->rol->set_modulo_club('1');
        $this->rol->set_modulo_personal('4');
        $this->rol->set_modulo_atletas('2');
        $this->rol->set_modulo_medicos('3');
        $this->rol->set_modulo_socioeconomicos('4');
        $this->rol->set_modulo_eventos('5');
        $this->rol->set_modulo_usuarios('3');
        $this->rol->set_modulo_bitacora('4');
        $this->rol->set_modulo_roles('5');
        $this->rol->set_modulo_inscripcion('3');
        $this->rol->set_modulo_emparejamientos('6');
        $this->rol->set_modulo_resultados('4');
        $this->rol->set_modulo_historial('3');
        $this->rol->set_modulo_reportes('4');

        $registro = $this->rol->registrar('1','29831184','9');

        $this->assertEquals('ingrese datos correctamente', $registro);
    }
}

?>