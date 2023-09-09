<?php 
 
use PHPUnit\Framework\TestCase;


use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_eventos;
use modelo\inscripcion_evento;
use modelo\emparejamiento_combates;

class guardar_emparejamientosTest extends TestCase{
    private $eventos;
    private $clubes;
    private $inscripcion;
    private $emparejamiento;
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
        $this->inscripcion = new inscripcion_evento();
        $this->emparejamientos = new emparejamiento_combates();
        
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');

        $id_club = self::$pdo->query('SELECT  id from clubes where codigo="qwertyuiop"')->fetch(\PDO::FETCH_ASSOC)['id']; 

        $this->eventos->set_nombre_evento('torneo peleas furiosas 1999');
        $this->eventos->set_fecha_evento('2023-03-07');
        $this->eventos->set_hora_evento('19:30');
        $this->eventos->set_club_responsable_evento($id_club);
        $this->eventos->set_monto_evento('1$');
        $this->eventos->set_direccion_evento('barquisimeto');
        $this->eventos->set_juez1('ruander cuello');
        $this->eventos->set_juez2('cirez barriga');
        $this->eventos->set_juez3('luis perdomo');

        $this->eventos->registrar('1','29831184','6');

        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="torneo peleas furiosas 1999"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->inscripcion->set_evento_inscripcion($id_evento);
        $this->inscripcion->set_cedula_inscripcion('12092167');
        $this->inscripcion->set_nombre_inscripcion('Raul Aguilar');
        $this->inscripcion->set_sexo_inscripcion('Masculino');
        $this->inscripcion->set_peso_inscripcion('80.3');
        $this->inscripcion->set_fechadenacimiento('1974-10-31');
        $this->inscripcion->set_estado('Lara');

        $this->inscripcion->incluir('1','29831184','10');
    }

    public function tearDown():void {

        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="torneo peleas furiosas 1999"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->inscripcion->elimina_atletas($id_evento,'12092167','29831184','10'); 

        $this->eventos->set_nombre_evento('torneo peleas furiosas 1999');
        $this->eventos->eliminar('29831184','6','1'); 

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1','1');
    }

    public function testGuardarEmparejamiento(){
    
        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="torneo peleas furiosas 1999"')->fetch(\PDO::FETCH_ASSOC)['id'];
        
        $id_atleta = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $json_atleta = json_encode(array($id_atleta));

        $this->assertEquals('Registro Guardado',$this->emparejamientos->guarda($id_evento,$json_atleta,'29831184','11'));
    }
}

?>