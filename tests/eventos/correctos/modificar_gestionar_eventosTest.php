<?php 
use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_eventos;

class modificar_gestionar_eventosTest extends TestCase{
     private $eventos;
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
        
        $this->eventos = new gestionar_eventos();

        $this->clubes = new gestionar_clubes();
        
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');

        $id_club = self::$pdo->query('SELECT  id from clubes where codigo="qwertyuiop"')->fetch(\PDO::FETCH_ASSOC)['id']; 

        $this->eventos->set_nombre_evento('evento deportivo miami 2023');
        $this->eventos->set_fecha_evento('2023-03-07');
        $this->eventos->set_hora_evento('19:30');
        $this->eventos->set_club_responsable_evento($id_club);
        $this->eventos->set_monto_evento('1$');
        $this->eventos->set_direccion_evento('barquisimeto');
        $this->eventos->set_juez1('ruander cuello');
        $this->eventos->set_juez2('cirez barriga');
        $this->eventos->set_juez3('luis perdomo');

        $this->eventos->registrar('1','29831184','6');
    }

    public function tearDown():void {
        $this->eventos->set_nombre_evento('evento deportivo miami 2023');
        $this->eventos->eliminar('29831184','6','1'); 

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1','1');
    }

    public function testModificarEventos(){

        $id_club = self::$pdo->query('SELECT  id from clubes where codigo="qwertyuiop"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->eventos->set_nombre_evento('evento deportivo miami 2023');
        $this->eventos->set_fecha_evento('2023-04-09');
        $this->eventos->set_hora_evento('16:30');
        $this->eventos->set_club_responsable_evento($id_club);
        $this->eventos->set_monto_evento('2$');
        $this->eventos->set_direccion_evento('quibor');
        $this->eventos->set_juez1('pedro sanchez');
        $this->eventos->set_juez2('juan barriga');
        $this->eventos->set_juez3('mario castana');
        
        $modificar = $this->eventos->modificar('1','29831184','6');

         $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>