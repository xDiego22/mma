<?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_personal;

class consultar_gestionar_personalTest extends TestCase{
    private $personal;
    private $clubes;
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
        
        $this->personal = new gestionar_personal();
        $this->clubes = new gestionar_clubes();
        
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');

        $id_club = self::$pdo->query('SELECT  id from clubes where codigo="qwertyuiop"')->fetch(\PDO::FETCH_ASSOC)['id']; 

        $this->personal->set_club_personal($id_club);
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

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1','1');
    }

    public function testConsultarPersonal(){
        $consultar = $this->personal->consultar('1','29831184','2');
        $this->assertStringStartsWith('<tr>', $consultar);
    }
}

?>