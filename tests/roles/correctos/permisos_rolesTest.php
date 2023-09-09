<?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\roles_permisos;

class permisos_rolesTest extends TestCase{
    private $rol;
    protected static $pdo;

    public static function setUpBeforeClass():void {
        try {
            $host = 'mysql:host=localhost;dbname=bdmma';
            self::$pdo = new PDO($host, 'root', '');
        } catch (\Exception $e) {
            $this->markTestSkipped('MySQL: No se pudo conectar a la base de datos.');
        }
    }

    public function setUp():void{
        $this->rol = new roles_permisos();

        $this->rol->set_nombre('rol de prueba');
        $this->rol->set_descripcion('rol para pruebas phpunit');
 
        $this->rol->set_modulo_club('true');
        $this->rol->set_modulo_personal('false');
        $this->rol->set_modulo_atletas('false');
        $this->rol->set_modulo_medicos('false');
        $this->rol->set_modulo_socioeconomicos('false');
        $this->rol->set_modulo_eventos('false');
        $this->rol->set_modulo_usuarios('false');
        $this->rol->set_modulo_bitacora('false');
        $this->rol->set_modulo_roles('false');
        $this->rol->set_modulo_inscripcion('false');
        $this->rol->set_modulo_emparejamientos('false');
        $this->rol->set_modulo_resultados('false');
        $this->rol->set_modulo_historial('false');
        $this->rol->set_modulo_reportes('false');

        $this->rol->registrar('1','29831184','9');
    }
 
    public function tearDown():void {
        $this->rol->set_nombre('rol de prueba');
        $this->rol->eliminar('29831184','9','1'); 
    }

    public function testPermisosRol(){

        $id_rol = self::$pdo->query('SELECT id from roles where nombre="rol de prueba"')->fetch(\PDO::FETCH_ASSOC)['id']; 

        $this->rol->set_rol_2($id_rol);

        
        $this->assertEquals('permiso actualizado',$this->rol->actualizar_permisos('1','false','true','false','false','1'));
    }
}

?>