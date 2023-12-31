<?php 

use PHPUnit\Framework\TestCase;
use modelo\roles_permisos;

class registrar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function testRegistrarRol(){
        
        $this->rol->set_nombre('qwer123');
        $this->rol->set_descripcion('2131?¡?¡');
        $this->rol->set_modulo_club('1d#');
        $this->rol->set_modulo_personal('e$%1');
        $this->rol->set_modulo_atletas('/rrd');
        $this->rol->set_modulo_medicos('!ddw');
        $this->rol->set_modulo_socioeconomicos('!"#d');
        $this->rol->set_modulo_eventos('3D$');
        $this->rol->set_modulo_usuarios('3d3');
        $this->rol->set_modulo_bitacora('&%f');
        $this->rol->set_modulo_roles('$fg');
        $this->rol->set_modulo_inscripcion('7%&&');
        $this->rol->set_modulo_emparejamientos('@#!q');
        $this->rol->set_modulo_resultados('33d');
        $this->rol->set_modulo_historial('gr3#$');
        $this->rol->set_modulo_reportes('4w!');

        $registro = $this->rol->registrar('1%&','2983%$2','%&2');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>