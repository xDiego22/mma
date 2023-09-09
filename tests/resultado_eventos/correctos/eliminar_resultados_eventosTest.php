 <?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_eventos;
use modelo\inscripcion_evento;
use modelo\emparejamiento_combates;
use modelo\resultados_eventos;

class eliminar_resultados_eventosTest extends TestCase{
    private $eventos;
    private $clubes;
    private $inscripcion;
    private $emparejamiento;
    private $resultados;
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
        $this->resultados = new resultados_eventos();
        
        //registro de club
        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');

        //registro de evento
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
        //inscripcion atleta 1
        $this->inscripcion->set_evento_inscripcion($id_evento);
        $this->inscripcion->set_cedula_inscripcion('12092167');
        $this->inscripcion->set_nombre_inscripcion('Raul Aguilar');
        $this->inscripcion->set_sexo_inscripcion('Masculino');
        $this->inscripcion->set_peso_inscripcion('80.3');
        $this->inscripcion->set_fechadenacimiento('1974-10-31');
        $this->inscripcion->set_estado('Lara');

        $this->inscripcion->incluir('1','29831184','10');

        //inscripcion atleta 2
        $this->inscripcion->set_evento_inscripcion($id_evento);
        $this->inscripcion->set_cedula_inscripcion('12092169');
        $this->inscripcion->set_nombre_inscripcion('Rafael Aguilar');
        $this->inscripcion->set_sexo_inscripcion('Masculino');
        $this->inscripcion->set_peso_inscripcion('81');
        $this->inscripcion->set_fechadenacimiento('1974-10-30');
        $this->inscripcion->set_estado('Lara');

        $this->inscripcion->incluir('1','29831184','10');

        //guardar emparejamientos
        $id_atleta1 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta2 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092169"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $json_atleta = json_encode(array($id_atleta1,$id_atleta2));

       $this->emparejamientos->guarda($id_evento,$json_atleta,'29831184','11');

       //registrar resultado de eventos

        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="torneo peleas furiosas 1999"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta1 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta2 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->resultados->set_nombre_evento($id_evento);
        $this->resultados->set_atleta_ganador($id_atleta1);
        $this->resultados->set_atleta_perdedor($id_atleta2); 
        $this->resultados->set_ronda('1');
        $this->resultados->set_forma_ganar('sumision');
        
        $this->resultados->registrar('1','29831184','12');
    }

    public function tearDown():void {

        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="torneo peleas furiosas 1999"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->inscripcion->elimina_atletas($id_evento,'12092167','29831184','10','1'); 

        $this->eventos->set_nombre_evento('torneo peleas furiosas 1999');
        $this->eventos->eliminar('29831184','6','1'); 

        $this->clubes->set_codigo_club('qwertyuiop');
        $this->clubes->eliminar('29831184','1','1');
    }

    public function testEliminarResultadosEventos(){

        $id_evento = self::$pdo->query('SELECT id from eventos where nombre="torneo peleas furiosas 1999"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta1 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $id_atleta2 = self::$pdo->query('SELECT id from inscripcion_evento where cedula="12092167"')->fetch(\PDO::FETCH_ASSOC)['id'];

        $this->resultados->set_nombre_evento($id_evento);
        $this->resultados->set_atleta_ganador($id_atleta1);
        $this->resultados->set_atleta_perdedor($id_atleta2); 
        $this->resultados->set_ronda('1');
        $this->resultados->set_forma_ganar('sumision');
        
        $this->assertEquals('eliminado',$this->resultados->eliminar('29831184','12','1'));

    }

}

?>