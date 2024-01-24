<?php 

use PHPUnit\Framework\TestCase;
use modelo\conexion;
use modelo\roles_permisos;

class registrar_rolesTest extends TestCase{
    private $rol;

    public function setUp():void{
        $this->rol = new roles_permisos();
    }

    public function tearDown():void {
        $this->rol->set_nombre('rol de prueba');
        $this->rol->eliminar('29831184','9','1'); 
    }

    public function testRegistrarRol(){
        
        $this->rol->set_nombre('rol de prueba');
        $this->rol->set_descripcion('rol para pruebas phpunit');
 
        $this->rol->set_modulo_club('true');
        $this->rol->set_modulo_personal('false');
        $this->rol->set_modulo_atletas('false');
        $this->rol->set_modulo_medicos('false');
        $this->rol->set_modulo_socioeconomicos('false');
        $this->rol->set_modulo_eventos('false');
        $this->rol->set_modulo_respaldo('false');
        $this->rol->set_modulo_usuarios('false');
        $this->rol->set_modulo_bitacora('false');
        $this->rol->set_modulo_roles('false');
        $this->rol->set_modulo_inscripcion('false');
        $this->rol->set_modulo_emparejamientos('false');
        $this->rol->set_modulo_resultados('false');
        $this->rol->set_modulo_historial('false');
        $this->rol->set_modulo_reportes('false');

        $registro = $this->rol->registrar('1','29831184','9');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>