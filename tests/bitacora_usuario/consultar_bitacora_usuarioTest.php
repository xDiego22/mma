<?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\bitacora_usuario;

class consultar_bitacora_usuarioTest extends TestCase{
    private $clubes;
    private $bitacora;
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
        $this->clubes = new gestionar_clubes();
        $this->bitacora = new bitacora_usuario();

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');
    }

    public function tearDown():void {
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1'); 
    }

    public function testBitacoraUsuario(){
        $bitacora = $this->bitacora->consultar('1');

        $this->assertStringStartsWith('<tr>', $bitacora);
    }
}

?>