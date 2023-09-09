<?php 

use PHPUnit\Framework\TestCase;

use modelo\roles_permisos;

class registrar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function testRegistrarRol(){
        
        $this->rol->set_nombre('');
        $this->rol->set_descripcion('');
 
        $this->rol->set_modulo_club('');
        $this->rol->set_modulo_personal('');
        $this->rol->set_modulo_atletas('');
        $this->rol->set_modulo_medicos('');
        $this->rol->set_modulo_socioeconomicos('');
        $this->rol->set_modulo_eventos('');
        $this->rol->set_modulo_usuarios('');
        $this->rol->set_modulo_bitacora('');
        $this->rol->set_modulo_roles('');
        $this->rol->set_modulo_inscripcion('');
        $this->rol->set_modulo_emparejamientos('');
        $this->rol->set_modulo_resultados('');
        $this->rol->set_modulo_historial('');
        $this->rol->set_modulo_reportes('');

        $registro = $this->rol->registrar('1','29831184','9');

        $this->assertEquals('ingrese datos correctamente', $registro);
    }
}

?>