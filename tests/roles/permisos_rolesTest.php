<?php 

use PHPUnit\Framework\TestCase;

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
    }

    public function testPermisosRol(){

        $id_rol = self::$pdo->query('SELECT id from roles where nombre="8213908310?¡?"')->fetch(\PDO::FETCH_ASSOC)['id']; 

        $this->rol->set_rol_2($id_rol);

        
        $this->assertEquals('ingrese datos correctamente',$this->rol->actualizar_permisos('1','false','true','false','false'));
    }
}

?>